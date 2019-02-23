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
            'tanggal'       => $this->dateTime()->notNull(),
            'pembeli'       => $this->string()->notNull(),
            'total_harga'   => $this->integer()->notNull(),
            'keterangan'    => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pembelian}}');
    }
}
