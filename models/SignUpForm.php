<?php

namespace app\models;


use yii\base\Model;


class SignUpForm extends Model
{
    public $login;
    public $password;
    public $email;

    public function rules()
    {
        return [
            [['login', 'password', 'email'], 'required', 'message' => 'Обязательно к заполнению!'],
            ['login', 'unique', 'targetClass' => User::className(),  'message' => 'Этот логин уже занят'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'password' => 'Пароль',
            'email' => 'email'
        ];
    }
}