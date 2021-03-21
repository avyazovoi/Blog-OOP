<?php

use yii\db\Migration;

/**
 * Class m210226_165112_create_category_teble
 */
class m210226_165112_create_category_teble extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('category');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210226_165112_create_category_teble cannot be reverted.\n";

        return false;
    }
    */
}
