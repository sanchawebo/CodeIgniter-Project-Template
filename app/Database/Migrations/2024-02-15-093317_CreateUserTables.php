<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTables extends Migration
{
    public $foreignTable = 'users';
    public $foreignField = 'id';

    public function up()
    {
        // User Logos
        $this->forge->addField([
            'id' => [
                'type'           => 'int',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'int',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'name' => [
                'type'       => 'varchar',
                'constraint' => 100,
            ],
            'file_name' => [
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
        $this->forge->addForeignKey('user_id', $this->foreignTable, $this->foreignField, 'CASCADE', 'RESTRICT');
        $this->forge->createTable('user_logos');
        // User Settings
        $this->forge->addField([
            'id' => [
                'type'           => 'int',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'int',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'frontend_lang' => [
                'type'       => 'varchar',
                'constraint' => 3,
                'null'       => true,
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
        $this->forge->addForeignKey('user_id', $this->foreignTable, $this->foreignField, 'CASCADE', 'RESTRICT');
        $this->forge->createTable('user_settings');

        // User Addresses
        $this->forge->addField([
            'id' => [
                'type'           => 'int',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'int',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'name' => [
                'type'       => 'varchar',
                'constraint' => 100,
                'null'       => true,
            ],
            'url' => [
                'type'       => 'varchar',
                'constraint' => 100,
                'null'       => true,
            ],
            'street_1' => [
                'type'       => 'varchar',
                'constraint' => 100,
                'null'       => true,
            ],
            'street_2' => [
                'type'       => 'varchar',
                'constraint' => 100,
                'null'       => true,
            ],
            'zip_code' => [
                'type'       => 'varchar',
                'constraint' => 20,
                'null'       => true,
            ],
            'city' => [
                'type'       => 'varchar',
                'constraint' => 100,
                'null'       => true,
            ],
            'state' => [
                'type'       => 'varchar',
                'constraint' => 100,
                'null'       => true,
            ],
            'country' => [
                'type'       => 'varchar',
                'constraint' => 100,
                'null'       => true,
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
        $this->forge->addForeignKey('user_id', $this->foreignTable, $this->foreignField, 'CASCADE', 'RESTRICT');
        $this->forge->createTable('user_addresses');
    }

    public function down()
    {
        $this->forge->dropTable('user_logos');
        $this->forge->dropTable('user_settings');
        $this->forge->dropTable('user_addresses');
    }
}
