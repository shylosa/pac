<?php

use yii\db\Migration;

/**
 * Class m190611_103547_remove_category_id_from_book_table
 */
class m190611_103547_remove_category_id_from_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('book', 'category_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190611_103547_remove_category_id_from_book_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190611_103547_remove_category_id_from_book_table cannot be reverted.\n";

        return false;
    }
    */
}
