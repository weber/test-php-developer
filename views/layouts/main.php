<?php
use yii\helpers\Html;
use app\assets\AppAsset;
/* @var $this yii\web\View */
/* @var $content string */
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
        <section class="b-line ">
            <div class="b-wrap">
                <div class="b-menu">
                    <a class="menu__item" href="/form">Работа с формами</a>
                    <a class="menu__item" href="/db">Работа с базой данных</a>
                    <a class="menu__item" href="/regexp">Работа с регулярными выражениями</a>
                    <!-- /.menu__item -->
                </div>
                <!-- /.menu -->
            </div>
            <!-- /.b-wrap -->
        </section>

        <?= $content ?>
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>