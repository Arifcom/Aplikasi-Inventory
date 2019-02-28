<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->active = 'Barang';
$this->title = 'Barangs';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile(
    '@web/public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css',
    ['depends' => [\yii\bootstrap\BootstrapAsset::className()],]
);
$this->registerJsFile(
    '@web/public/bower_components/datatables.net/js/jquery.dataTables.min.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '@web/public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJs(
    '
            $(\'#data-table\').DataTable({
                \'paging\'      : true,
                \'lengthChange\': false,
                \'searching\'   : true,
                \'ordering\'    : true,
                \'info\'        : true,
                \'autoWidth\'   : false
            })
	    '
);
?>
<div class="barang-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Barang', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Table Barang</h3>
        </div>
        <div class="box-body">
            <div class="row text-center">
                <div class="btn-group">
                    <a href="#" class="btn btn-default">Import</a>
                    <?= Html::a('Export', ['barang/export'], ['class' => 'btn btn-default']) ?>
                </div>
            </div>
            <table id="data-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($query as $data):
                ?>
                    <tr>
                        <td><?= $data['id']; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['stok']; ?></td>
                        <td><?= $data['satuan']; ?></td>
                        <td><?= $data['harga_beli']; ?></td>
                        <td><?= $data['harga_jual']; ?></td>
                        <td><?= Html::a('Update', ['update', 'id' => $data['id']]) ?></td>
                        <td><?= Html::a('Delete', ['delete', 'id' => $data['id']]) ?></td>
                    </tr>
                <?php
                endforeach;
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>
