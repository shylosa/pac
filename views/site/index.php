<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Библиотека PAC';
?>
<div class="site-index">

<!--  <div class="jumbotron">-->
<!--    <h1>Библиотека PAC</h1>-->
<!--    <p class="lead">Добро пожаловать в нашу библиотеку!</p>-->
<!--  </div>-->

  <div class="main-content">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
            <?php foreach($books as $book):?>
            <article class="post">
              <div class="post-content">
                <header class="entry-header text-center text-uppercase">
                  <h1 class="entry-title"><a href="<?= Url::toRoute(['site/view', 'id'=>$book->id]);?>">
                          <?= $book->title?></a></h1>
                </header>
                <div class="post-thumb">

                  <h2>
                      <?php foreach( $book->getBookAuthors() as $author ): ?>
                        <li>
                          <?php echo $author; ?>
                        </li>
                      <?php endforeach; ?>
                  </h2>

                  <a href="<?= Url::toRoute(['site/view', 'id'=>$book->id]);?>">
                    <img src="<?= $book->getImage();?>" alt="" width="200">
                  </a>
                </div>
                <div class="entry-content">
                  <p><?= $book->description?>
                  </p>

                  <div class="btn-continue-reading text-center text-uppercase">
                    <a href="<?= Url::toRoute(['site/view', 'id'=>$book->id]);?>" class="more-link">Continue Reading
                    </a>
                  </div>
                </div>
              </div>
            </article>
            <?php endforeach;?>


              <?php echo LinkPager::widget([
              'pagination' => $pages,
              ]); ?>
        </div>
      </div>
    </div>
  </div>

</div>
