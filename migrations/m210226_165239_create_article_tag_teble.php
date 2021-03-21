<?php

use yii\db\Migration;

/**
 * Class m210226_165239_create_article_tag_teble
 */
class m210226_165239_create_article_tag_teble extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('article_tag', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer(),
            'tag_id' => $this->integer(),
        ]);

        //creates index for column `user_id`
        $this->createIndex(
            'tag_article_article_id',
            'article_tag',
            'article_id'
        );

        //add foreign key table `user`
        $this->addForeignKey(
            'tag_article_article_id',
            'article_tag',
            'article_id',
            'article',
            'id',
            'CASCADE'
        );

        //create index for column `tag_id`
        $this->createIndex(
            'idx-tag_id',
            'article_tag',
            'tag_id'
        );
        //add foreign key for table `tag`
        $this->addForeignKey(
            'fk-tag_id',
            'article_tag',
            'tag_id',
            'tag',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('article_tag');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210226_165239_create_article_tag_teble cannot be reverted.\n";

        return false;
    }
    */
}
