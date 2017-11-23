<?php

use yii\db\Migration;

class m160216_122508_reserve extends Migration
{
    public function up()
    {
        $this->createTable('reserve', [
            'id' => $this->primaryKey(),
            'price' => $this->integer(),
            'count' => $this->integer()->notNull(),
            'eventId' => $this->integer(),
            'userId' => $this->integer()
        ]);

        $this->createIndex('IDX_reserve_userId' , 'reserve' , 'userId');
        $this->addForeignKey('FK_reserve_user' , 'reserve' , 'userId' , 'user' , 'id' , 'SET NULL' , 'SET NULL');

        $this->createIndex('IDX_reserve_eventId' , 'reserve' , 'eventId');
        $this->addForeignKey('FK_reserve_event' , 'reserve' , 'eventId' , 'event' , 'id' , 'SET NULL' , 'SET NULL');
    }

    public function down()
    {
        $this->dropTable('reserve');
    }
}
