<?php

use yii\db\Migration;

/**
 * Class m190821_120717_cards
 */
class m190821_120717_cards extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cards',[
            'id'=>$this->primaryKey(), // id
            'nomber'=>$this->string(25),   // Nomber of the card
            'valid'=>$this->integer(1),    // Valid or not (block i meen)
            'valid_to'=>$this->integer(),  // When do expar. (datetime to int)
            'used'=>$this->integer(),    // In use by some customer or not
            'circulation'=>$this->integer(), // Nomber of circulation (printing new card package)
            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m190821_120717_cards cannot be reverted.\n";
        $this->dropTable('cards');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190821_120717_cards cannot be reverted.\n";

        return false;
    }
    */
}
