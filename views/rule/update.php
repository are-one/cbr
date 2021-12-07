<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rule */

$this->title = 'Update Rule: ' . $model->gejala_id;
$this->params['breadcrumbs'][] = ['label' => 'Rules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->gejala_id, 'url' => ['view', 'gejala_id' => $model->gejala_id, 'penyakit_id' => $model->penyakit_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
