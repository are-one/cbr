<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Rule */

$this->title = $model->gejala_id;
$this->params['breadcrumbs'][] = ['label' => 'Rules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="rule-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'gejala_id' => $model->gejala_id, 'penyakit_id' => $model->penyakit_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'gejala_id' => $model->gejala_id, 'penyakit_id' => $model->penyakit_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'gejala_id',
            'penyakit_id',
        ],
    ]) ?>

</div>
