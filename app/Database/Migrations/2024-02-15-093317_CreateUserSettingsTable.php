<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Forge;
use CodeIgniter\Database\Migration;
use Config\Auth;

class CreateUserSettingsTable extends Migration
{
    /**
     * @var array<string,string>
     */
    private array $tables;

    public function __construct(?Forge $forge = null)
    {
        parent::__construct($forge);

        /** @var Auth $authConfig */
        $authConfig   = config('Auth');
        $this->tables = $authConfig->tables;
    }

    public function up()
    {
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
        $this->forge->addForeignKey('user_id', $this->tables['users'], 'id', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('user_settings');
    }

    public function down()
    {
        $this->forge->dropTable('user_settings');
    }
}
