<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

Yii::$app->assetManager->bundles = ['yii\bootstrap4\BootstrapAsset' => false];

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="?">BERANDA</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">

                <?= Nav::widget([
                    'options' => ['class' => 'navbar-nav'],
                    'items' => [
                        ['label' => 'Penyakit', 'url' => ['/site/index']],
                        ['label' => 'Gejala', 'url' => ['/site/index']],
                        ['label' => 'Pengetahuan', 'url' => ['/site/index']],
                        ['label' => 'Password', 'url' => ['/site/index'],'visible' => Yii::$app->user->can('admin')],
                        ['label' => 'Konsultasi', 'url' => ['/site/index'],'visible' => Yii::$app->user->can('admin')],
                        ['label' => 'Informasi', 'url' => ['/site/index'],'visible' => Yii::$app->user->can('admin')],
                        // ['label' => 'About', 'url' => ['/site/about']],
                        // ['label' => 'Contact', 'url' => ['/site/contact']],
                        Yii::$app->user->isGuest ? (
                            ['label' => '<span class="glyphicon glyphicon-log-in"></span> Login', 'url' => ['/site/login'], 'encode' => false]
                        ) : (
                            '<li>'
                            . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                            . Html::submitButton(
                                '<span class="glyphicon glyphicon-log-out"></span> Logout (' . Yii::$app->user->identity->username . ')',
                                ['class' => 'btn btn-link logout', 'style'=> 'text-decoration:none']
                            )
                            . Html::endForm()
                            . '</li>'
                        )
                    ],
                ]); ?>

                <!-- <ul class="nav navbar-nav">
                    <li><a href="?m=penyakit"><span class="glyphicon glyphicon-pushpin"></span> Penyakit</a></li>
                    <li><a href="?m=gejala"><span class="glyphicon glyphicon-flash"></span> Gejala</a></li>
                    <li><a href="?m=pengetahuan"><span class="glyphicon glyphicon-star"></span> Pengetahuan</a></li>
                    <li><a href="?m=password"><span class="glyphicon glyphicon-lock"></span> Password</a></li>
                    <li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    <li><a href="?m=konsultasi"><span class="glyphicon glyphicon-stats"></span> Konsultasi</a></li>
                    <li><a href="?m=informasi"><span class="glyphicon glyphicon-info-sign"></span> Informasi</a></li>
                    <li><a href="?m=login"><span class="glyphicon glyphicon-log-in"></span> Login Admin</a></li>
                </ul> -->
            </div>
        </div>
    </nav>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

    <footer class="footer bg-danger">
        <div class="container">
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>