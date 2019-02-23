<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%penjualan}}`.
 */
class m190223_064523_create_penjualan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%penjualan}}', [
            'id'            => $this->primaryKey(),
            'tanggal'       => $this->dateTime()->notNull(),
            'penjual'       => $this->string()->notNull(),
            'total_harga'   => $this->integer()->notNull(),
            'keterangan'    => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%penjualan}}');
    }
}
