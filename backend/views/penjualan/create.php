<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Penjualan */

$this->active = 'Penjualan';
$this->title = 'Create Penjualan';
$this->params['breadcrumbs'][] = ['label' => 'Penjualans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penjualan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Form Data Penjualan</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
