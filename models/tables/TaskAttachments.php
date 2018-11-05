<?php

namespace app\models\tables;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * This is the model class for table "task_attachments".
 *
 * @property int $id
 * @property string $path
 * @property int $task_id
 *
 * @property Tasks $task
 */
class TaskAttachments extends Model
{

    public $image;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_attachments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_id'], 'integer'],
            [['path'], 'string', 'max' => 255],
            [['task_id'], 'unique'],
            [['image'], 'file', 'extensions' => 'jpeg, phg'],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tasks::className(), 'targetAttribute' => ['task_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path' => 'Path',
            'task_id' => 'Task ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Tasks::className(), ['id' => 'task_id']);
    }
}
