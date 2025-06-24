<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateParameterTable extends Migration
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
                'comment'    => 'Application falls back to "GB"-countrycode if no country specific code was found.',
            ],
            'lang_code' => [
                'type'       => 'varchar',
                'constraint' => 3,
                'comment'    => 'Application falls back to "en"-langcode if no language specific code was found.',
            ],
            'name' => [
                'type'       => 'varchar',
                'constraint' => 100,
            ],
            'value' => [
                'type'       => 'varchar',
                'constraint' => 255,
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
        $this->forge->addUniqueKey(['country_code', 'lang_code', 'name']);
        $this->forge->createTable('parameters');
    }

    public function down()
    {
        $this->forge->dropTable('parameters');
    }
}
