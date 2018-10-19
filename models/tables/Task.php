<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property int $name_id
 * @property string $task
 * @property string $description
 * @property string $created
 * @property string $user
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'date'], 'required'],
            [['date'], 'safe'],
            [['description'], 'string'],
            [['user_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Name ID',
            'task' => 'Task',
            'description' => 'Description',
            'created' => 'Created',
            'user' => 'User',
        ];
    }
}
