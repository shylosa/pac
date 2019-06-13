<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Book */

$this->title = 'Create Book';
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-create">

  <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::a('Set Image', ['set-image', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    <?= Html::a('Set Categories', ['set-categories', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    <?= Html::a('Set Authors', ['set-authors', 'id' => $model->id], ['class' => 'btn btn-default']) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
