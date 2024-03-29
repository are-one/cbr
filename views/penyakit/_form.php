<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Penyakit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penyakit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_penyakit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_penyakit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_penyakit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'penyebab')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'solusi_penyakit')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
