<?php

namespace app\models\tables;

use Yii;
use yii\base\Model;
use yii\behaviors\TimestampBehavior;
use yii\captcha\Captcha;
use yii\db\Expression;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property int $role_id
 * @property string $email
 * @property Tasks[] $tasks
 * @property Roles $role
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'email'], 'required'],
            [['role_id'], 'integer'],
            [['email', 'email']],
            [['login'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 128],
            [['email'], 'unique', 'targetClass' => Users::className(), 'message' => 'Такой email уже зарегестрирован!'],
            [['login'], 'unique', 'targetClass' => Users::className(), 'message' => 'Логин занят!'],
         ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'role_id' => 'Role ID',
            'email' => 'Email',
            'name' =>'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Roles::className(), ['id' => 'role_id']);
    }

    public function getTasks()
    {
        return $this->hasMany(Tasks::className(), ['user_id' => 'id']);
    }

    public function addUser()
    {
        $user = new Users();
        $user->login = $this->login;
        $user->password= \Yii::$app->security->generatePasswordHash($this->password);
        $user->email = $this->email;
        $user->role_id = $this->role_id;
        return $user->save();
    }
}
