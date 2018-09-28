<?php

use yii\db\Migration;

/**
 * Class m180928_050843_leng_var1
 */
class m180928_050843_leng_var1 extends Migration
{
    // /**
    //  * {@inheritdoc}
    //  */
    // public function safeUp()
    // {
    //
    // }
    //
    // /**
    //  * {@inheritdoc}
    //  */
    // public function safeDown()
    // {
    //     echo "m180928_050843_leng_var1 cannot be reverted.\n";
    //
    //     return false;
    // }

    /*
     * Use up()/down() to run migration code without a transaction.
     */
    public function up()
    {

        $sql = "DROP TRIGGER work.mng_collision;";
        $this->execute($sql);

        $this->renameTable('tbl_robot', 'old_tbl_robot');

        $sql = "CREATE TABLE tbl_robot LIKE old_tbl_robot;";
        $this->execute($sql);

        $this->addColumn('tbl_robot', 'leng', $this->string('2')->notNull()->defaultValue('en'));




        // $sql = "DELIMITER | ";
        // $this->execute($sql);

        $sql = " CREATE TRIGGER mng_collision AFTER DELETE ON tbl_discipline
                FOR EACH ROW BEGIN
                  UPDATE tbl_robot SET discipline = DEFAULT WHERE discipline IS NULL;
                END; | ";

        $this->execute($sql);

        // $sql = "DELIMITER ; ";
        // $this->execute($sql);

    }

    public function down()
    {

        $sql = "DROP TRIGGER work.mng_collision;";
        $this->execute($sql);

        $this->dropTable('tbl_robot');

        $this->renameTable('old_tbl_robot', 'tbl_robot');

        // $sql = "DELIMITER | ";
        // $this->execute($sql);

        $sql = " CREATE TRIGGER mng_collision AFTER DELETE ON tbl_discipline
                FOR EACH ROW BEGIN
                  UPDATE tbl_robot SET discipline = DEFAULT WHERE discipline IS NULL;
                END; | ";

        $this->execute($sql);

        // $sql = "DELIMITER ; ";
        // $this->execute($sql);

          // echo "m180928_050843_leng_var1 cannot be reverted.\n";
          // return false;
    }

}
