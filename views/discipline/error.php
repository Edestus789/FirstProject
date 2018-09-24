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

        <a href="https://yandex.ru/search/?text=%D1%87%D1%82%D0%BE%20%D0%BF%D0%BE%D0%B4%D0%B5%D0%BB%D0%B0%D1%82%D1%8C%20%D1%81%D0%BC%D0%B0%D0%B9%D0%BB&lr=16&clid=2186620">
          E-mail@e-mail.org
        </a>
    </p>
</div>
