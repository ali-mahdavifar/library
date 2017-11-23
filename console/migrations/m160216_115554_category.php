<?php

use yii\db\Migration;

class m160216_115554_category extends Migration
{
    public function up()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'borrowable' => $this->boolean()->notNull(),
            'timeLimit' => $this->integer()->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable('category');
    }
}
