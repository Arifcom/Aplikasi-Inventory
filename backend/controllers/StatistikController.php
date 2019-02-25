<?php

namespace backend\controllers;

use Yii;
use common\models\Barang;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

class StatistikController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $query_pembelian_januari = (new \yii\db\Query())
            ->select('*')
            ->from('pembelian')
            ->where('month(tanggal) = 01')
            ->all();
        $query_pembelian_februari = (new \yii\db\Query())
            ->select('*')
            ->from('pembelian')
            ->where('month(tanggal) = 02')
            ->all();
        $query_pembelian_maret = (new \yii\db\Query())
            ->select('*')
            ->from('pembelian')
            ->where('month(tanggal) = 03')
            ->all();
        $query_pembelian_april = (new \yii\db\Query())
            ->select('*')
            ->from('pembelian')
            ->where('month(tanggal) = 04')
            ->all();
        $query_pembelian_mei = (new \yii\db\Query())
            ->select('*')
            ->from('pembelian')
            ->where('month(tanggal) = 05')
            ->all();
        $query_pembelian_juni = (new \yii\db\Query())
            ->select('*')
            ->from('pembelian')
            ->where('month(tanggal) = 06')
            ->all();
        $query_pembelian_juli = (new \yii\db\Query())
            ->select('*')
            ->from('pembelian')
            ->where('month(tanggal) = 07')
            ->all();
        $query_pembelian_agustus = (new \yii\db\Query())
            ->select('*')
            ->from('pembelian')
            ->where('month(tanggal) = 08')
            ->all();
        $query_pembelian_september = (new \yii\db\Query())
            ->select('*')
            ->from('pembelian')
            ->where('month(tanggal) = 09')
            ->all();
        $query_pembelian_oktober = (new \yii\db\Query())
            ->select('*')
            ->from('pembelian')
            ->where('month(tanggal) = 10')
            ->all();
        $query_pembelian_november = (new \yii\db\Query())
            ->select('*')
            ->from('pembelian')
            ->where('month(tanggal) = 11')
            ->all();
        $query_pembelian_desember = (new \yii\db\Query())
            ->select('*')
            ->from('pembelian')
            ->where('month(tanggal) = 12')
            ->all();

        $query_penjualan_januari = (new \yii\db\Query())
            ->select('*')
            ->from('penjualan')
            ->where('month(tanggal) = 1')
            ->all();
        $query_penjualan_februari = (new \yii\db\Query())
            ->select('*')
            ->from('penjualan')
            ->where('month(tanggal) = 2')
            ->all();
        $query_penjualan_maret = (new \yii\db\Query())
            ->select('*')
            ->from('penjualan')
            ->where('month(tanggal) = 3')
            ->all();
        $query_penjualan_april = (new \yii\db\Query())
            ->select('*')
            ->from('penjualan')
            ->where('month(tanggal) = 4')
            ->all();
        $query_penjualan_mei = (new \yii\db\Query())
            ->select('*')
            ->from('penjualan')
            ->where('month(tanggal) = 5')
            ->all();
        $query_penjualan_juni = (new \yii\db\Query())
            ->select('*')
            ->from('penjualan')
            ->where('month(tanggal) = 6')
            ->all();
        $query_penjualan_juli = (new \yii\db\Query())
            ->select('*')
            ->from('penjualan')
            ->where('month(tanggal) = 7')
            ->all();
        $query_penjualan_agustus = (new \yii\db\Query())
            ->select('*')
            ->from('penjualan')
            ->where('month(tanggal) = 8')
            ->all();
        $query_penjualan_september = (new \yii\db\Query())
            ->select('*')
            ->from('penjualan')
            ->where('month(tanggal) = 9')
            ->all();
        $query_penjualan_oktober = (new \yii\db\Query())
            ->select('*')
            ->from('penjualan')
            ->where('month(tanggal) = 10')
            ->all();
        $query_penjualan_november = (new \yii\db\Query())
            ->select('*')
            ->from('penjualan')
            ->where('month(tanggal) = 11')
            ->all();
        $query_penjualan_desember = (new \yii\db\Query())
            ->select('*')
            ->from('penjualan')
            ->where('month(tanggal) = 12')
            ->all();

        return $this->render('index', [
            'count_query_pembelian_januari' => count($query_pembelian_januari),
            'count_query_pembelian_februari' => count($query_pembelian_februari),
            'count_query_pembelian_maret' => count($query_pembelian_maret),
            'count_query_pembelian_april' => count($query_pembelian_april),
            'count_query_pembelian_mei' => count($query_pembelian_mei),
            'count_query_pembelian_juni' => count($query_pembelian_juni),
            'count_query_pembelian_juli' => count($query_pembelian_juli),
            'count_query_pembelian_agustus' => count($query_pembelian_agustus),
            'count_query_pembelian_september' => count($query_pembelian_september),
            'count_query_pembelian_oktober' => count($query_pembelian_oktober),
            'count_query_pembelian_november' => count($query_pembelian_november),
            'count_query_pembelian_desember' => count($query_pembelian_desember),

            'count_query_penjualan_januari' => count($query_penjualan_januari),
            'count_query_penjualan_februari' => count($query_penjualan_februari),
            'count_query_penjualan_maret' => count($query_penjualan_maret),
            'count_query_penjualan_april' => count($query_penjualan_april),
            'count_query_penjualan_mei' => count($query_penjualan_mei),
            'count_query_penjualan_juni' => count($query_penjualan_juni),
            'count_query_penjualan_juli' => count($query_penjualan_juli),
            'count_query_penjualan_agustus' => count($query_penjualan_agustus),
            'count_query_penjualan_september' => count($query_penjualan_september),
            'count_query_penjualan_oktober' => count($query_penjualan_oktober),
            'count_query_penjualan_november' => count($query_penjualan_november),
            'count_query_penjualan_desember' => count($query_penjualan_desember),
        ]);
    }
}
