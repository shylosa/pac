<?php

/* @var $this yii\web\View */

?>

<div class="body-content">

        <div class="row">
            <div class="col-lg-5">
                <h2><?= $title ?></h2>

                <div>Жанр:
                  <?php foreach( $categories as $category ): ?>
                          <li>
                              <?php echo $category; ?>
                          </li>
                  <?php endforeach; ?>
                </div>
                <img src="<?= $image ?>" alt="<?= $title?>" width="200">
                <div>Автор:
                    <?php foreach( $authors as $author ): ?>
                             <li>
                                 <?php echo $author; ?>
                             </li>
                    <?php endforeach; ?>
                </div>
                <div>Название: <?= $title ?></div>
                <div>Описание: <?= $description ?></div>
                <div>Год: <?= $datePublishing ?></div>

                <p><a class="btn btn-default" href="/">На главную страницу</a></p>
            </div>

        </div>

    </div>