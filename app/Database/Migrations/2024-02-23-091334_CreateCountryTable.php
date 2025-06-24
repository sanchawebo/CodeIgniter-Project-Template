<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCountryTable extends Migration
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
            'display_name_en' => [
                'type'       => 'varchar',
                'constraint' => 100,
            ],
            'display_name_de' => [
                'type'       => 'varchar',
                'constraint' => 100,
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
        $this->forge->addUniqueKey('country_code');
        $this->forge->createTable('countries');
    }

    public function down()
    {
        $this->forge->dropTable('countries');
    }
}
