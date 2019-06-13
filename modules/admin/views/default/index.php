<?php

use app\models\BookSearch;
use yii\data\ActiveDataProvider;
use yii\grid\SerialColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admin';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="default-index">


    <h3><a href="<?php Url::to()?>/admin/book/index">Book</a></h3>
    <h3><a href="<?php Url::to()?>/admin/author/index">Author</a></h3>
    <h3><a href="<?php Url::to()?>/admin/category/index">Category</a></h3>

</div>
