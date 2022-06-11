<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use function Psy\debug;

class AccountController extends Controller
{
    public function login(Request $request)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) session_start();
        ['login' => $login, 'password' => $password] = $_POST;
        $user = User::all()->where('login', $login)->where('password', md5($password))->first();
        if (!$user) {
            $text = "Неверные логин или пароль";
            return view('login', ['error' => $text]);
        } else {
            $_SESSION['user'] = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'login' => $user->login,
                'password' => $user->password,
            ];
            if (($_POST['login']=='admin') && (md5($_POST['password'])=='21232f297a57a5a743894a0e4a801fc3')) {
                $_SESSION['user']['isAdmin'] = 1; }

            return view('home');
        }
        exit;
    }

    public function logout()
    {
        session_destroy();
        return view('home');
    }

    public function register(Request $request)
    {
        $request->validate([
            'login' => 'required|min:4|max:255|unique:users,login',
            'password' => 'required|min:4|max:255',
            'email' => 'required|email',
        ]);

        ['name' => $name, 'email' => $email, 'login' => $login, 'password' => $password] = $request;
        $password = md5($password);
        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->login = $login;
        $user->password = $password;
        $saved = $user->save();
        if ($saved) {
            $text = "Пользователь зарегестрирован";;
        } else {
            $text = "Не удалось создать пользователя";
        }
    }
}
