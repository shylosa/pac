<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookAuthorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Book Authors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-author-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Book Author', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'book_id',
            'author_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
