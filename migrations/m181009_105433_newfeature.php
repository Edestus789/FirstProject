<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m181009_105433_newfeature
 */
class m181009_105433_newfeature extends Migration {

    public function up() {

        $sql = "DROP TRIGGER IF EXISTS mng_collision;";
        $this->execute($sql);
        $sql = "DROP TRIGGER IF EXISTS mng_discipline_collision;";
        $this->execute($sql);

        $this->dropTable('tbl_robot');
        $this->dropTable('tbl_discipline');

        $tableOptions = 'ENGINE=InnoDB CHARACTER SET=UTF8 DEFAULT COLLATE utf8_general_ci';

        $this->createTable('{{%tbl_discipline}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_STRING,
        ], $tableOptions);

        $this->createTable('{{%tbl_platform}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_STRING,
        ], $tableOptions);

        $this->createTable('{{%tbl_robot}}', [
            'id' => Schema::TYPE_PK,
            'yname' => Schema::TYPE_STRING,
            'sname' => Schema::TYPE_STRING,
            'rname' => Schema::TYPE_STRING,
            'discipline' => $this->Integer()->defaultValue(1),
            'platform' => $this->Integer()->defaultValue(1),
            'weight' => Schema::TYPE_STRING,
        ], $tableOptions);

        $this->addForeignKey(
            'fk-disc-rob',
            'tbl_robot',
            'discipline',
            'tbl_discipline',
            'id',
            'SET null',
            'NO ACTION'

        );

        $this->addForeignKey(
            'fk-plat-rob',
            'tbl_robot',
            'platform',
            'tbl_platform',
            'id',
            'SET null',
            'NO ACTION'
        );

        $sql = "
            CREATE TRIGGER mng_discipline_collision AFTER DELETE ON tbl_discipline
            FOR EACH ROW BEGIN
                UPDATE tbl_robot SET discipline = DEFAULT WHERE discipline IS NULL;
            END;
        ";
        $this->execute($sql);

        $sql = "
            CREATE TRIGGER mng_platform_collision AFTER DELETE ON tbl_platform
            FOR EACH ROW BEGIN
                UPDATE tbl_robot SET platform = DEFAULT WHERE platform IS NULL;
            END;
        ";
        $this->execute($sql);
    }

    public function down() {

        $sql = "DROP TRIGGER IF EXISTS mng_discipline_collision;";
        $this->execute($sql);
        $sql = "DROP TRIGGER IF EXISTS mng_platform_collision;";
        $this->execute($sql);

        $this->dropTable('tbl_robot');
        $this->dropTable('tbl_discipline');
        $this->dropTable('tbl_platform');

        $tableOptions = 'ENGINE=InnoDB CHARACTER SET=UTF8 DEFAULT COLLATE utf8_general_ci';

        $this->createTable('{{%tbl_discipline}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_STRING,
        ], $tableOptions);

        $this->createTable('{{%tbl_robot}}', [
            'id' => Schema::TYPE_PK,
            'yname' => Schema::TYPE_STRING,
            'sname' => Schema::TYPE_STRING,
            'rname' => Schema::TYPE_STRING,
            'discipline' => $this->Integer()->defaultValue(1),
            'platform' => Schema::TYPE_STRING,
            'weight' => Schema::TYPE_STRING,
        ], $tableOptions);

        $this->addForeignKey(
            'fk-disc-rob',
            'tbl_robot',
            'discipline',
            'tbl_discipline',
            'id',
            'SET null',
            'NO ACTION'
        );

        $sql = "
            CREATE TRIGGER mng_discipline_collision AFTER DELETE ON tbl_discipline
            FOR EACH ROW BEGIN
                UPDATE tbl_robot SET discipline = DEFAULT WHERE discipline IS NULL;
            END;
        ";
        $this->execute($sql);
    }
}
