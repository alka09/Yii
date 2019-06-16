<?php

use yii\db\Migration;

/**
 * Handles the creation of table `add_to_users`.
 */
class m181026_142513_create_add_to_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users', 'create_at', $this->integer()->notNull());
        $this->addColumn('users', 'update_at', $this->integer()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('users', 'create_at');
        $this->dropColumn('users', 'update_at');
    }
}
