<?php

namespace app\models;

use Yii;

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
}