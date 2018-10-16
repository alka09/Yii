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
            [['name_id', 'task', 'description', 'user'], 'required'],
            [['name_id'], 'integer'],
            [['created'], 'safe'],
            [['task'], 'string', 'max' => 128],
            [['description'], 'string', 'max' => 1024],
            [['user'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_id' => 'Name ID',
            'task' => 'Task',
            'description' => 'Description',
            'created' => 'Created',
            'user' => 'User',
        ];
    }
}
