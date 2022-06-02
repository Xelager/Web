<?php
namespace app\models;
use app\core\Model;
use app\models\entities\Blog;
use app\models\entities\Comment;
use app\models\entities\User;
use app\models\validators\CommentValidator;

class CommentModel extends Model
{
    public $commentTable;
    public $userTable;

    public array $validated_fields = [
        "content" => ""
    ];

    function __construct()
    {
        $this->commentTable = new Comment();
        $this->userTable = new User();
        $this->validator = new CommentValidator();
    }

    function validateForm($post_data)
    {
        unset($post_data["submit"]);

        foreach ($this->validated_fields as $key => $data)
        {
            if (!empty($post_data[$key])) {
                $this->validated_fields[$key] = $post_data[$key];
            }
        }
        return $this->validator->validate($this->validated_fields);
    }

    public function getCommentsByPublication($publicationId)
    {
        return $this->commentTable->getRecordsFromByField("publicationId", $publicationId,  "ORDER BY createdAt DESC");
    }
}
