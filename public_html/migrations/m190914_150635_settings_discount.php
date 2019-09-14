<?php

use yii\db\Migration;

/**
 * Class m190914_150635_settings_discount
 */
class m190914_150635_settings_discount extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('settings_discount',[
            'first_step'=>$this->double(),
            'first_discount_percent'=>$this->double(),
            'second_step'=>$this->double(),
            'second_discount_percent'=>$this->double(),
            'third_step'=>$this->double(),
            'third_discount_percent'=>$this->double(),
            'bonus_discount_percent'=>$this->double()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('settings_discount');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190914_150635_settings_discount cannot be reverted.\n";

        return false;
    }
    */
}
