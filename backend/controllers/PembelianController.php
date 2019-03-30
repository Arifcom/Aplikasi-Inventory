<?php

namespace backend\controllers;

use Yii;
use common\models\Barang;
use common\models\Pembelian;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * PembelianController implements the CRUD actions for Pembelian model.
 */
class PembelianController extends Controller
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
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'import', 'export'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Pembelian models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query = (new \yii\db\Query())
            ->select('*, pembelian.id as id')
            ->from('pembelian')
            ->join('INNER JOIN', 'barang', 'pembelian.id_barang = barang.id')
            ->all();

        return $this->render('index', [
            'query' => $query,
        ]);
    }

    /**
     * Displays a single Pembelian model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pembelian model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pembelian();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $barang = Barang::findOne($_POST['Pembelian']['id_barang']);
            $barang->stok = $barang->stok + $_POST['Pembelian']['jumlah'];
            $barang->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pembelian model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->post()) {
            $barang = Barang::findOne($_POST['Pembelian']['id_barang']);
            $barang->stok = ($barang->stok - $model->jumlah) + $_POST['Pembelian']['jumlah'];
            $barang->save();
            $model->load(Yii::$app->request->post());
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pembelian model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionImport()
    {
        $nama = $_FILES['import_data_pembelian']['name'];
        $file_tmp = $_FILES['import_data_pembelian']['tmp_name'];
        move_uploaded_file($file_tmp, Yii::getAlias('@backend/web/files/documents/').$nama);
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);
        $spreadsheet = $reader->load(Yii::getAlias('@backend/web/files/documents/').$nama);

        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();

        for ($row = 2; $row <= $highestRow; $row++) {
            $model = new Pembelian();
            $model->id_barang = '1';
            $model->tanggal = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
            $model->pembeli = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
            $model->jumlah = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
            $model->total_harga = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
            $model->keterangan = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
            $model->save();
        }
        unlink(Yii::getAlias('@backend/web/files/documents/').$nama);
    }

    public function actionExport()
    {
        $query = (new \yii\db\Query())
            ->select('*, pembelian.id as id')
            ->from('pembelian')
            ->join('INNER JOIN', 'barang', 'pembelian.id_barang = barang.id')
            ->all();

        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $mpdf->WriteHTML('<h3 style="text-align: center;">Table</h3>');
        $mpdf->WriteHTML('<table border="1" style="margin: 0 auto;">');
        $mpdf->WriteHTML('<thead>');
        $mpdf->WriteHTML('<tr>');
        $mpdf->WriteHTML('<th>ID</th>');
        $mpdf->WriteHTML('<th>Nama Barang</th>');
        $mpdf->WriteHTML('<th>Pembeli</th>');
        $mpdf->WriteHTML('<th>Tanggal</th>');
        $mpdf->WriteHTML('<th>Jumlah</th>');
        $mpdf->WriteHTML('<th>Total Harga</th>');
        $mpdf->WriteHTML('</tr>');
        $mpdf->WriteHTML('</thead>');
        $mpdf->WriteHTML('<tbody>');
        foreach($query as $data):
        $mpdf->WriteHTML('<tr>');
        $mpdf->WriteHTML('<td>' . $data['id'] . '</td>');
        $mpdf->WriteHTML('<td>' . $data['nama'] . '</td>');
        $mpdf->WriteHTML('<td>' . $data['pembeli'] . '</td>');
        $mpdf->WriteHTML('<td>' . $data['tanggal'] . '</td>');
        $mpdf->WriteHTML('<td>' . $data['jumlah'] . '</td>');
        $mpdf->WriteHTML('<td>' . $data['total_harga'] . '</td>');
            $mpdf->WriteHTML('</tr>');
        endforeach;
        $mpdf->WriteHTML('</tbody>');
        $mpdf->WriteHTML('</table>');
        $mpdf->Output();
    }

    /**
     * Finds the Pembelian model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pembelian the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pembelian::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
