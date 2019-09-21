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

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190921_113357_customers_log cannot be reverted.\n";

        return false;
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
