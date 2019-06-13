<?php

use yii\grid\SerialColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

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
            [ 'format' => 'html',
                'label' => 'Description',
              'value' => static function($data){
                    return Html::tag('p',
                        \yii\helpers\StringHelper::truncate($data->description,256, '...'));
              }
            ],
            'date_publishing',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
