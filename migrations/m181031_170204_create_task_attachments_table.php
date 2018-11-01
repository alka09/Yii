<?php

use yii\db\Migration;

/**
 * Handles the creation of table `task_attachments`.
 */
class m181031_170204_create_task_attachments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('task_attachments', [
            'id' => $this->primaryKey(),
            'path' => $this->string(),
            'task_id' => $this->integer(),
        ]);
        $this->addForeignKey("fk_task_attachments_tasks", 'task_attachments', 'task_id', 'tasks', 'id');
        $this->createIndex("ix_task_attachments_task_id", "task_attachments", "task_id", true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('task_attachments');
    }
}
