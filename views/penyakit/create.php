<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Penyakit */

$this->title = 'Create Penyakit';
$this->params['breadcrumbs'][] = ['label' => 'Penyakits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penyakit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
