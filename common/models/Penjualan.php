<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "penjualan".
 *
 * @property int $id
 * @property int $id_barang
 * @property string $tanggal
 * @property string $penjual
 * @property int $total_harga
 * @property string $keterangan
 *
 * @property Barang $barang
 */
class Penjualan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penjualan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_barang', 'tanggal', 'penjual', 'jumlah', 'total_harga', 'keterangan'], 'required'],
            [['id_barang', 'jumlah', 'total_harga'], 'integer'],
            [['tanggal'], 'safe'],
            [['penjual', 'keterangan'], 'string', 'max' => 255],
            [['id_barang'], 'exist', 'skipOnError' => true, 'targetClass' => Barang::className(), 'targetAttribute' => ['id_barang' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_barang' => 'Id Barang',
            'tanggal' => 'Tanggal',
            'penjual' => 'Penjual',
            'jumlah' => 'Jumlah',
            'total_harga' => 'Total Harga',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarang()
    {
        return $this->hasOne(Barang::className(), ['id' => 'id_barang']);
    }
}
