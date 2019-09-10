<?php

use yii\db\Migration;

/**
 * Class m190910_061025_customers
 */
class m190910_061025_customers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('customers',[
            'id'=>$this->primaryKey(),
            'customer_name'=>$this->string(250)->notNull(),
            'customer_phone'=>$this->string(25)->notNull(),
            'card_id'=>$this->string(25)->notNull()
            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('customers');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190910_061025_customers cannot be reverted.\n";

        return false;
    }
    */
}
