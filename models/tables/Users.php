<?php

namespace app\models\tables;

use Yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property int $role_id
 * @property string $email
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $auth_key
 * @property string $email_confirm_token
 * @property string $password_reset_token
 */
class Users extends ActiveRecord
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
            ['login', 'required'],
            ['login', 'string', 'max' => 50],
            ['login', 'unique'],

            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => self::className(), 'message' => 'This email address has already been taken.'],
            ['email', 'string', 'max' => 255],

            ['password', 'required', 'string', 'max' => 128]

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
              ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
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


    public function getUser()
    {
        $user = new Users();
        $user->login = $this->login;
        $user->password = \Yii::$app->security->generatePasswordHash($this->password);
        $user->role_id = $this->role_id;
        $user->email = $this->email;
//        var_dump($user->save());
        $user->save();
    }


}
