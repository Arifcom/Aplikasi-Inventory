<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%barang}}`.
 */
class m190223_064224_create_barang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%barang}}', [
            'id'            => $this->primaryKey(),
            'gambar'        => $this->string()->notNull(),
            'nama'        => $this->string()->notNull(),
            'stok'          => $this->integer()->notNull(),
            'satuan'        => $this->string()->notNull(),
            'harga_beli'    => $this->integer()->notNull(),
            'harga_jual'    => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%barang}}');
    }
}
