<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gejala */

$this->title = 'Create Gejala';
$this->params['breadcrumbs'][] = ['label' => 'Gejalas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gejala-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
