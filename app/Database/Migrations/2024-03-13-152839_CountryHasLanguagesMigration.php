<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CountryHasLanguagesMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'int',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'country_code' => [
                'type'       => 'varchar',
                'constraint' => 3,
            ],
            'lang_code' => [
                'type'       => 'varchar',
                'constraint' => 3,
            ],
            'created_at' => [
                'type' => 'datetime',
            ],
            'updated_at' => [
                'type' => 'datetime',
            ],
            'deleted_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('country_code', 'countries', 'country_code', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('lang_code', 'languages', 'lang_code', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('country_has_languages');
    }

    public function down()
    {
        $this->forge->dropTable('country_has_languages');
    }
}
