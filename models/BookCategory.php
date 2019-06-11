<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book_category".
 *
 * @property int $id
 * @property int $book_id
 * @property int $category_id
 */
class BookCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_id', 'category_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_id' => 'Book ID',
            'category_id' => 'Category ID',
        ];
    }
}
