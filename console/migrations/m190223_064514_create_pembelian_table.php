<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pembelian}}`.
 */
class m190223_064514_create_pembelian_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pembelian}}', [
            'id'            => $this->primaryKey(),
            'id_barang'     => $this->integer()->notNull(),
            'tanggal'       => $this->dateTime()->notNull(),
            'pembeli'       => $this->string()->notNull(),
            'jumlah'        => $this->integer()->notNull(),
            'total_harga'   => $this->integer()->notNull(),
            'keterangan'    => $this->string()->notNull(),
        ]);

        $this->createIndex(
            'i-pembelian-id_barang',
            'pembelian',
            'id_barang'
        );

        $this->addForeignKey(
            'fk-pembelian-id_barang',
            'pembelian',
            'id_barang',
            'barang',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pembelian}}');
    }
}
