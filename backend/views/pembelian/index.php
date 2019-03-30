<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->active = 'Pembelian';
$this->title = 'Pembelians';
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
<div class="pembelian-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pembelian', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Table Barang</h3>
        </div>
        <div class="box-body">
            <div class="row text-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#import-data-pembelian">Import</button>
                    <?= Html::a('Export', ['pembelian/export'], ['class' => 'btn btn-default']) ?>
                </div>
            </div>
            <table id="data-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Pembeli</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
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
                        <td><?= $data['pembeli']; ?></td>
                        <td><?= $data['tanggal']; ?></td>
                        <td><?= $data['jumlah']; ?></td>
                        <td><?= $data['total_harga']; ?></td>
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
                    <th>Nama Barang</th>
                    <th>Pembeli</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>

<div id="import-data-pembelian" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <?= Html::beginForm(['pembelian/import'], 'post', ['enctype' => 'multipart/form-data']) ?>

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="text-align: center;">Import Data</h4>
            </div>
            <div class="modal-body">
                <input type="file" name="import_data_pembelian" />
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

        <?= Html::endForm() ?>

    </div>
</div>
