<?php

use yii\db\Migration;

class m160216_121646_borrow extends Migration
{
    public function up()
    {
        $this->createTable('borrow', [
            'id' => $this->primaryKey(),
            'beginDate' => $this->integer()->notNull(),
            'endDate' => $this->integer()->notNull(),
            'transferDate' => $this->integer(),
            'penalty' => $this->integer(),
            'bookId' => $this->integer(),
            'userId' => $this->integer()
        ]);

        $this->createIndex('IDX_borrow_userId' , 'borrow' , 'userId');
        $this->addForeignKey('FK_borrow_user' , 'borrow' , 'userId' , 'user' , 'id' , 'SET NULL' , 'SET NULL');

        $this->createIndex('IDX_borrow_bookId' , 'borrow' , 'bookId');
        $this->addForeignKey('FK_borrow_book' , 'borrow' , 'bookId' , 'book' , 'id' , 'SET NULL' , 'SET NULL');
    }

    public function down()
    {
        $this->dropTable('borrow');
    }
}
