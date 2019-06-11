<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BookCategory */

$this->title = 'Update Book Category: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Book Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="book-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
