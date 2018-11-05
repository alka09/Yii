<?php

use yii\db\Migration;

/**
 * Class m181104_203036_create_add_to_users_table_new_columns
 */
class m181104_203036_create_add_to_users_table_new_columns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users', 'auth_key', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('users', 'auth_key');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181104_203036_create_add_to_users_table_new_columns cannot be reverted.\n";

        return false;
    }
    */
}
