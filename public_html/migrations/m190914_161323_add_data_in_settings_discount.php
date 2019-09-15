<?php

use yii\db\Migration;

/**
 * Class m190914_161323_add_data_in_settings_discount
 */
class m190914_161323_add_data_in_settings_discount extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('settings_discount',[
            'first_step'=>0,
            'first_discount_percent'=>0,
            'second_step'=>0,
            'second_discount_percent'=>0,
            'third_step'=>0,
            'third_discount_percent'=>0,
            'bonus_discount_percent'=>0.1,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('settings_discount');

        
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190914_161323_add_data_in_settings_discount cannot be reverted.\n";

        return false;
    }
    */
}
