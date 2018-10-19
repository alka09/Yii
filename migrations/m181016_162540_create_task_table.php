<?php

use yii\db\Migration;

/**
 * Handles the creation of table `task`.
 */
class m181016_162540_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('task', [
            'id' => $this->primaryKey(),
            'name' => $this->string(128)->notNull(),
            'date' => $this->dateTime(),
            'description' => $this->string(1024)->notNull(),
            'user_id' => $this->integer()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('task');
    }
}
