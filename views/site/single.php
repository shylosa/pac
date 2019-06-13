<?php

/* @var $this yii\web\View */

?>

<div class="body-content">
  <div class="row">
    <div class="col-md-10">
      <h2 class="text-primary"><?= $title ?></h2>

      <div>
        <span class="text-primary">Жанр:</span>
          <?php foreach( $categories as $category ): ?>
            <li>
                <?php echo $category; ?>
            </li>
          <?php endforeach; ?>
        </div>

      <img src="<?= $image ?>" alt="<?= $title?>" width="200">
      <div>
        <span class="text-primary">Автор:</span>
          <?php foreach( $authors as $author ): ?>
            <li>
                <?php echo $author; ?>
            </li>
          <?php endforeach; ?>
      </div>

      <div>
        <span class="text-primary">Год:</span>
          <?= $datePublishing ?>
      </div>

      <div>
          <span class="text-primary">Название:</span>
          <?= $title ?>
      </div>
        <div><span class="text-primary">Описание:</span>
          <?= $description ?>
      </div>

      <p><a class="btn btn-primary" href="/">На главную страницу</a></p>
    </div>

  </div>
</div>