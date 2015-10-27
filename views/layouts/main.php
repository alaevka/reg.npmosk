<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href='https://fonts.googleapis.com/css?family=Play&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <?php $this->head() ?>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php $this->beginBody() ?>
    <?php
    // NavBar::begin([
    //     'brandLabel' => 'My Company',
    //     'brandUrl' => Yii::$app->homeUrl,
    //     'options' => [
    //         'class' => 'navbar-inverse navbar-fixed-top',
    //     ],
    // ]);
    // echo Nav::widget([
    //     'options' => ['class' => 'navbar-nav navbar-right'],
    //     'items' => [
    //         ['label' => 'Home', 'url' => ['/site/index']],
    //         ['label' => 'About', 'url' => ['/site/about']],
    //         ['label' => 'Contact', 'url' => ['/site/contact']],
    //         Yii::$app->user->isGuest ?
    //             ['label' => 'Login', 'url' => ['/site/login']] :
    //             [
    //                 'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
    //                 'url' => ['/site/logout'],
    //                 'linkOptions' => ['data-method' => 'post']
    //             ],
    //     ],
    // ]);
    // NavBar::end();
    ?>

    
        <?php /*echo Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])*/ ?>
    <div class="container-fluid" style="min-width: 970px !important;">
        <?= $content ?>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
