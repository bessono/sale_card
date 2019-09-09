<?php

use yii\db\Migration;

/**
 * Class m190822_081618_managers
 */
class m190822_081618_managers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('managers',
            ['id'=>$this->primaryKey(),
            'username'=>$this->string(250)->notNull(),
            'password'=>$this->string(250)->notNull(),
            'access_token'=>$this->string(250),
            'auth_key'=>$this->string(250),
            'banned'=>$this->integer(1)->defaultValue(0),
            'email'=>$this->string(250),
            ]
    );
        $this->insert('managers',['username'=>'admin','password'=>md5('admin')]);
        $this->insert('managers',['username'=>'seller','password'=>md5('seller')]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('managers');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190822_081618_managers cannot be reverted.\n";

        return false;
    }
    */
}
