<?php

namespace app\models\admin;

use app\models\AppModel;

class User extends AppModel
{
    public $attributes = [
        'id' => '',
        'login' => '',
        'password' => '',
        'name' => '',
        'email' => '',
        'address' => '',
        'role' => '',
    ];

    public $rules = [
        'required' => [
            ['login'],
            ['name'],
            ['email'],
            ['role'],
        ],
        'email' => [
            ['email'],
        ],
    ];

    public function checkUnique()
    {
        $user = \R::findOne('user', '(login = ? OR email = ?) AND id <> ?', [$this->attributes['login'], $this->attributes['email'], $this->attributes['id']]);
        if ($user) {
            if ($user->login == $this->attributes['login']) {
                $this->errors['unique'][] = 'Этот логин уже занят';
            }
            if ($user->email == $this->attributes['email']) {
                $this->errors['unique'][] = 'Этот емаел уже занят';
            }
            return false;
        }
        return true;
    }

}