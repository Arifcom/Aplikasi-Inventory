<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pembelian */

$this->active = 'Pembelian';
$this->title = 'Create Pembelian';
$this->params['breadcrumbs'][] = ['label' => 'Pembelians', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembelian-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Form Data Pembelian</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
