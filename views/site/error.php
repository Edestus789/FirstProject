<?php

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

        <a href="https://ya.ru/">
            E-mail@e-mail.org
        </a>
    </p>
</div>
