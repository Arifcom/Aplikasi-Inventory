<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "penjualan".
 *
 * @property int $id
 * @property string $tanggal
 * @property string $penjual
 * @property int $total_harga
 * @property string $keterangan
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
            [['tanggal', 'penjual', 'total_harga', 'keterangan'], 'required'],
            [['tanggal'], 'safe'],
            [['total_harga'], 'integer'],
            [['penjual', 'keterangan'], 'string', 'max' => 255],
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
            'penjual' => 'Penjual',
            'total_harga' => 'Total Harga',
            'keterangan' => 'Keterangan',
        ];
    }
}
