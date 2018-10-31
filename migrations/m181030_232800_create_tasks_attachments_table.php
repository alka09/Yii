<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tasks_attachments`.
 */
class m181030_232800_create_tasks_attachments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tasks_attachments', [
            'id' => $this->primaryKey(),
            'path' => $this->string(),
            'task_id' => $this -> integer()
        ]);

        $this->addForeignKey('fk_task_attachments_tasks', 'tasks_attachments', 'task_id', 'tasks', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tasks_attachments');
    }
}
