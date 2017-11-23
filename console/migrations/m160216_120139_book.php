<?php

use yii\db\Migration;

class m160216_120139_book extends Migration
{
    public function up()
    {
        $this->createTable('book', [
            'id' => $this->primaryKey(),
            'isbn' => $this->string(11)->notNull(),
            'title' => $this->string()->notNull(),
            'publisher' => $this->string()->notNull(),
            'count' => $this->integer()->notNull(),
            'categoryId' => $this->integer()
        ]);

        $this->createIndex('IDX_book_categoryId' , 'book' , 'categoryId');
        $this->addForeignKey('FK_book_category' , 'book' , 'categoryId' , 'category' , 'id' , 'SET NULL' , 'SET NULL');

        $this->createIndex('UNQ_book_isbn' , 'book' , 'isbn' , true);
    }

    public function down()
    {
        $this->dropTable('book');
    }
}
