<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "author".
 *
 * @property int $id
 * @property string $name
 * @property string $surename
 * @property string $patronimic
 * @property string $date_birth
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['date_birth'], 'date', 'format' => 'php: Y-m-d'],
            [['date_birth'], 'default', 'value' => date('Y-m-d')],
            [['name', 'surename', 'patronimic'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surename' => 'Surename',
            'patronimic' => 'Patronimic',
            'date_birth' => 'Date Birth',
        ];
    }


    public function getBooks()
    {
        return $this->hasMany(Book::class, ['id' => 'book_id'])
            ->viaTable('book_author', ['author_id' => 'id']);
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->surename . ' ' . $this->name . ' ' . $this->patronimic;
    }
}
