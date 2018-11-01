<?php

namespace app\models\tables;

use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $name
 * @property string $date
 * @property string $description
 * @property int $user_id
 *
 * @property Users $user
 * @property TaskAttachments $attachments
 */
class Tasks extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                /*'createdAtAttribute' => 'create_time',
                'updatedAtAttribute' => 'update_time',*/
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * Поиск по диапазону дат, начальная дата
     * @var string
     */

    public $createdFrom;

    /**
     * Поиск по диапазону дат, конечная дата
     * @var string
     */

    public $createdTo;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['date'], 'default', 'value' => date('Y-m-d:H:i:s')],
            [['date'], 'compare', 'compareValue' => date('Y-m-d'), 'operator' => '>='],
            [['user_id'], 'integer'],
            [['name'], 'string', 'max' => 128],
            [['description'], 'string', 'max' => 1024],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['fromDate'], 'safe', 'on' => 'search'],
            [['toDate'], 'safe', 'on' => 'search']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'date' => 'Date',
            'description' => 'Description',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    public function getTaskAttachments()
    {
        return $this->hasMany(TaskAttachments::class, ['task_id' => 'id']);
    }

    public static function getTaskCurrentMonth($month)
    {
        return static::find()
            ->where(["MONTH(date)" => $month]);
    }
}
