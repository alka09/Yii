<?php
namespace app\models;

use app\models\tables\Users;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;
    public $email;

    public static function tableName()
    {
        return 'users';
    }

    //private static $users = [
    //    '100' => [
    //        'id' => '100',
    //        'username' => 'admin',
    //        'password' => 'admin',
    //       'authKey' => 'test100key',
    //       'accessToken' => '100-token',
    //   ],
    //   '101' => [
    //       'id' => '101',
    //       'username' => 'demo',
    //       'password' => 'demo',
    //       'authKey' => 'test101key',
    //       'accessToken' => '101-token',
    //   ],
   // ];
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        if ($user = Users::findOne($id)) {
            return new static([
                'id' => $user->id,
                'username' => $user->login,
                'password' => $user->password,
                'email' => $user->email,
                'authKey' => $user->auth_key,
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('findIdentityByAccessToken is not implemented.');
    }
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        if ($user = Users::findOne(['login' => $username])) {
            return new static([
                'id' => $user->id,
                'username' => $user->login,
                'password' => $user->password,
            ]);
        }
    }


    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }
    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password);
    }

    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }
    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->generateAuthKey();
            }
            return true;
        }
        return false;
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password token
     * @return static|null
     */

    public static function findByPasswordResetToken($token) {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }
        return static::findOne([
            'password_reset_token' => $token
        ]);
    }

    public function generatePasswordResetToken(){
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }
}
