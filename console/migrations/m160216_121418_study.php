<?php

use yii\db\Migration;

class m160216_121418_study extends Migration
{
    public function up()
    {
        $this->createTable('study', [
            'id' => $this->primaryKey(),
            'bookId' => $this->integer(),
            'userId' => $this->integer()
        ]);

        $this->createIndex('IDX_study_userId' , 'study' , 'userId');
        $this->addForeignKey('FK_study_user' , 'study' , 'userId' , 'user' , 'id' , 'SET NULL' , 'SET NULL');

        $this->createIndex('IDX_study_bookId' , 'study' , 'bookId');
        $this->addForeignKey('FK_study_book' , 'study' , 'bookId' , 'book' , 'id' , 'SET NULL' , 'SET NULL');
    }

    public function down()
    {
        $this->dropTable('study');
    }
}
