<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m181016_065033_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'login' => $this->string(50)->notNull(),
            'password' => $this->string(128)->notNull(),
            'role_id' => $this->integer()->defaultValue(1)
        ]);

        $this->addForeignKey('fk_user_role_id', 'users', 'role_id', 'roles', 'id', 'CASCADE');
        $this->createIndex("ix_users_login", "users", "login", true);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
