<?php

use yii\db\Migration;

/**
 * Class m190613_131517_change_column_type_in_book_table
 */
class m190613_131517_change_column_type_in_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('book', 'description', 'text');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190613_131517_change_column_type_in_book_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190613_131517_change_column_type_in_book_table cannot be reverted.\n";

        return false;
    }
    */
}
