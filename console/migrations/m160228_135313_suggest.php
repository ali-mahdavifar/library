<?php

use yii\db\Migration;

class m160228_135313_suggest extends Migration
{
    public function up()
    {
        $this->createTable('suggest', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'publisher' => $this->string()->notNull(),
            'userId' => $this->integer()->notNull(),
        ]);

        $this->createIndex('IDX_suggest_userId' , 'suggest' , 'userId');
        $this->addForeignKey('FK_suggest_user' , 'suggest' , 'userId' , 'user' , 'id' , 'SET NULL' , 'SET NULL');
    }

    public function down()
    {
        $this->dropTable('suggest');
    }
}
