<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pembelian".
 *
 * @property int $id
 * @property string $tanggal
 * @property string $pembeli
 * @property int $total_harga
 * @property string $keterangan
 */
class Pembelian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pembelian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal', 'pembeli', 'total_harga', 'keterangan'], 'required'],
            [['tanggal'], 'safe'],
            [['total_harga'], 'integer'],
            [['pembeli', 'keterangan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tanggal' => 'Tanggal',
            'pembeli' => 'Pembeli',
            'total_harga' => 'Total Harga',
            'keterangan' => 'Keterangan',
        ];
    }
}
