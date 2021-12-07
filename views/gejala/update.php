<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gejala */

$this->title = 'Update Gejala: ' . $model->id_gejala;
$this->params['breadcrumbs'][] = ['label' => 'Gejalas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_gejala, 'url' => ['view', 'id_gejala' => $model->id_gejala]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gejala-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
