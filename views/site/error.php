<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;

?>

<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>

        <?php
           echo Yii::t('common', 'The above error occurred while the Web server was processing your request.');
        ?>

    </p>
    <p>

        <?php
           echo Yii::t('common', 'Please contact us if you think this is a server error. Thank you.');
        ?>

        <a href="https://yandex.ru/search/?lr=16&clid=2186620&text=%D0%BF%D0%BE%D0%B3%D1%83%D0%B3%D0%BB%D0%B8">
          E-mail@e-mail.org
        </a>
    </p>

</div>
