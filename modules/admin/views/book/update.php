<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Book */

$this->title = 'Update Book: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="book-update">

  <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::a('Set Image', ['set-image', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    <?= Html::a('Set Categories', ['set-categories', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    <?= Html::a('Set Authors', ['set-authors', 'id' => $model->id], ['class' => 'btn btn-default']) ?>

    <div  class="book-view">
      <?= DetailView::widget([
          'model' => $model,
          'attributes' => [
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
              ]
          ]
      ]) ?>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
