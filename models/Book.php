<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property string $description
 * @property string $date_publishing
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['date_publishing'], 'safe'],
            [['date_publishing'], 'date', 'format' => 'yyyy'],
            [['date_publishing'], 'default', 'value' => date('Y')],
            [['title', 'image', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'image' => 'Image',
            'description' => 'Description',
            'date_publishing' => 'Date Publishing',
        ];
    }

    public function saveImage($filename)
    {
        $this->image = $filename;
        return $this->save(false);
    }

    public function getImage()
    {
        return ($this->image) ? '/uploads/' . $this->image : '/no-image.png';
    }

    public function deleteImage()
    {
        $imageUploadModel = new ImageUpload();
        $imageUploadModel->deleteCurrentImage($this->image);
    }

    public function beforeDelete()
    {
        $this->deleteImage();
        return parent::beforeDelete();
    }

    public function getCategories()
    {
        return $this->hasMany(Category::class, ['id' => 'category_id'])
            ->viaTable('book_category', ['book_id' => 'id']);
    }

    public function getSelectedCategories()
    {
        $selectedIds = $this->getCategories()->select('id')->asArray()->all();

        return ArrayHelper::getColumn($selectedIds, 'id');
    }

    public function saveCategories($categories)
    {
        if (is_array($categories)){

            $this->clearCurrentCategories();

            foreach ($categories as $category_id)
            {
                $category = Category::findOne($category_id);
                $this->link('categories', $category);
            }
        }
    }

    public function clearCurrentCategories()
    {
        BookCategory::deleteAll(['book_id'=>$this->id]);
    }
}
