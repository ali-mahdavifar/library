<?php

use yii\db\Migration;

class m160228_083031_wait extends Migration
{
    public function up()
    {
        $this->createTable('wait', [
            'id' => $this->primaryKey(),
            'requestDate' => $this->integer()->notNull(),
            'bookId' => $this->integer(),
            'userId' => $this->integer()
        ]);

        $this->createIndex('IDX_wait_userId' , 'wait' , 'userId');
        $this->addForeignKey('FK_wait_user' , 'wait' , 'userId' , 'user' , 'id' , 'SET NULL' , 'SET NULL');

        $this->createIndex('IDX_wait_bookId' , 'wait' , 'bookId');
        $this->addForeignKey('FK_wait_book' , 'wait' , 'bookId' , 'book' , 'id' , 'SET NULL' , 'SET NULL');
    }

    public function down()
    {
        $this->dropTable('wait');
    }
}
