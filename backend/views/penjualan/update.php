<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Penjualan */

$this->active = 'Penjualan';
$this->title = 'Update Penjualan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Penjualans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penjualan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
