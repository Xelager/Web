<?php

namespace app\core;

use PDO;
use PDOException;

class BaseActiveRecord {
    public static $pdo;
    protected static $tablename;
    protected static $dbfields = array();

    public function __construct() {
        if (!static::$tablename) {
            return;
        }
        static::setupConnection();
        static::getFields();
    }

    public function setupConnection() {
        if (!isset(static::$pdo)) {
            try {
                $config = require 'app/config/dbData.php';
                static::$pdo = new PDO("mysql:dbname=" . $config['name'] . "; host=" . $config['host'] . "; 
                char-set=utf8", $config['user'], $config['password']);
            } catch (PDOException $ex) {
                die("Error connection to data base: $ex->errorInfo");
            }
        }
    }

    public function getCount() {
        $count = static::$pdo->query("SELECT COUNT(*) FROM " . static::$tablename)->fetch();
        return (int)$count[0];
    }

    public function getData() {
        foreach (static::$dbfields as $field => $field_type) {
            $value = $this->$field;
            if (!str_contains($field_type, 'int')) $value = "'$value'";
            $fields[] = $field;
            $values[] = $value;
        }
        return [$values, $fields];
    }

    public static function getFields() {
        $stmt = static::$pdo->query("SHOW FIELDS FROM " . static::$tablename);
        while ($row = $stmt->fetch()) {
            static::$dbfields[$row['Field']] = $row['Type'];
        }
    }

    public function save() {
        [$values, $fields] = $this->getData();

        if (isset($this->id)) {
            $countFields = count($fields);
            for ($i = 0; $i < $countFields; $i++) {
                $fields_list[] = $fields[$i] . ' = ' . $values[$i];
            }
            $sql = "UPDATE " . static::$tablename . " SET " . join(', ', array_slice($fields_list, 1)) . " WHERE ID=" . $this->id;
        } else {
            $sql = "INSERT INTO " . static::$tablename . " (" . join(', ', array_slice($fields, 1)) . ") VALUES(" . join(', ', array_slice($values, 1)) . ")";
        }

        return static::$pdo->query($sql);
    }

    public function find($id) {
        $sql = "SELECT * FROM " . static::$tablename . " WHERE id=$id";
        $stmt = static::$pdo->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        }
        $ar_obj = new static();
        foreach ($row as $key => $value) {
            $ar_obj->$key = $value;
        }
        return $ar_obj;
    }

    public function findAll() {
        $sql = "SELECT * FROM " . static::$tablename;
        $stmt = static::$pdo->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$rows) {
            return null;
        }

        $ar_objs = array();
        foreach ($rows as $row) {
            $obj = new static();
            foreach ($row as $key => $value) {
                $obj->$key = $value;
            }
            $ar_objs[] = $obj;
        }

        return $ar_objs;
    }

    public function delete() {
        $sql = "DELETE FROM " . static::$tablename . " WHERE ID=" . $this->id;
        $stmt = static::$pdo->query($sql);
        if ($stmt) {
            return true;
        } else {
            print_r(static::$pdo->errorInfo());
            return false;
        }
    }

    public function getRecordsWithPagination($start, $count, $subSQL = '') {
        $sql = "SELECT * FROM " . static::$tablename . ' ' . $subSQL . " LIMIT " . $start . ', ' . $count;
        $stmt = static::$pdo->query($sql);
        if (!$stmt)
        {
            return array();
        }
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$rows) {
            return array();
        }

        $ar_objs = array();
        foreach ($rows as $row) {
            $obj = new static();
            foreach ($row as $key => $value) {
                $obj->$key = $value;
            }
            $ar_objs[] = $obj;
        }

        return $ar_objs;
    }
}