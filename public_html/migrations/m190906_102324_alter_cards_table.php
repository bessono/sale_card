<?php

use yii\db\Migration;

/**
 * Class m190906_102324_alter_cards_table
 */
class m190906_102324_alter_cards_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('ALTER TABLE cards ADD discount_percent int default 0');
        $this->execute('ALTER TABLE cards ADD discount_bonus int default 0');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190906_102324_alter_cards_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190906_102324_alter_cards_table cannot be reverted.\n";

        return false;
    }
    */
}
