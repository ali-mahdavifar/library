<?php

use yii\db\Migration;

class m160216_121134_order extends Migration
{
    public function up()
    {
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'publisher' => $this->string()->notNull(),
            'count' => $this->integer()->notNull(),
            'userId' => $this->integer()
        ]);

        $this->createIndex('IDX_order_userId' , 'order' , 'userId');
        $this->addForeignKey('FK_order_user' , 'order' , 'userId' , 'user' , 'id' , 'SET NULL' , 'SET NULL');
    }

    public function down()
    {
        $this->dropTable('order');
    }
}
