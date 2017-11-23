<?php

use yii\db\Migration;

class m160216_122158_event extends Migration
{
    public function up()
    {
        $this->createTable('event', [
            'id' => $this->primaryKey(),
            'day' => $this->date()->notNull(),
            'startTime' => $this->integer()->notNull(),
            'endTime' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'speakers' => $this->text()->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable('event');
    }
}
