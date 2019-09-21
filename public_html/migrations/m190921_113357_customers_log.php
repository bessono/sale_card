<?php

use yii\db\Migration;

/**
 * Class m190921_113357_customers_log
 */
class m190921_113357_customers_log extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('customers_log',[
            'id'=>$this->primaryKey(),
            'customer_id'=>$this->integer(),
            'summ'=>$this->integer(),
            'additional'=>$this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('customers_log');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190921_113357_customers_log cannot be reverted.\n";

        return false;
    }
    */
}
