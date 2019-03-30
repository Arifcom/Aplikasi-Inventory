<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Barang */

$this->active = 'Barang';
$this->title = 'Create Barang';
$this->params['breadcrumbs'][] = ['label' => 'Barangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Form Data Barang</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
