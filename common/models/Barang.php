<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "barang".
 *
 * @property int $id
 * @property string $gambar
 * @property string $nama
 * @property int $stok
 * @property string $satuan
 * @property int $harga_beli
 * @property int $harga_jual
 */
class Barang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'barang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gambar', 'nama', 'stok', 'satuan', 'harga_beli', 'harga_jual'], 'required'],
            [['stok', 'harga_beli', 'harga_jual'], 'integer'],
            [['gambar', 'nama', 'satuan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gambar' => 'Gambar',
            'nama' => 'Nama',
            'stok' => 'Stok',
            'satuan' => 'Satuan',
            'harga_beli' => 'Harga Beli',
            'harga_jual' => 'Harga Jual',
        ];
    }
}
