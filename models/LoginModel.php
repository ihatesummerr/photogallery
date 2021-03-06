<?php

namespace app\models;

use ihate\mvc\Application;
use ihate\mvc\Model;
use ihate\mvc\validation\Email;
use ihate\mvc\validation\Required;

class LoginModel extends Model {

    public string $email = '';
    public string $password = '';


    public function rules(): array {
        return [
            'email' => [Required::class, Email::class],
            'password' => [Required::class]
        ];
    }

    public function labels(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Password'
        ];
    }

    public function login() {

        $user = User::findOne(['email' => $this->email]);
        if (!$user) {
            $this->addError('email', 'User does not exist with this email');
            return false;
        }

        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Password is incorrect');
            return false;
        }

        

        return Application::$app->login($user);
    }

}