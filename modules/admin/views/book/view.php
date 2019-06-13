<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Book */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            [
                'format' => 'html',
                'label' => 'Image',
                'value' => static function($data){
                    return Html::img($data->getImage(),['width'=>120]);
                }
            ],
            [   'format' =>'html',
                'label' => 'Categories',
                'value' => static function ($model){
                    return Html::ul($model->getBookCategories());
              }
            ],
            [   'format' =>'html',
                'label' => 'Author',
                'value' => static function ($model){
                    return Html::ul($model->getBookAuthors());
                }
            ],
            'description',
            'date_publishing',
        ]
    ]) ?>

</div>
