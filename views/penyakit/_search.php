<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\Penyakit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penyakit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_penyakit') ?>

    <?= $form->field($model, 'nama_penyakit') ?>

    <?= $form->field($model, 'jenis_penyakit') ?>

    <?= $form->field($model, 'penyebab') ?>

    <?= $form->field($model, 'solusi_penyakit') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
