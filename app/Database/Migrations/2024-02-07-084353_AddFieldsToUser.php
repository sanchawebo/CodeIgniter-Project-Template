<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Forge;
use CodeIgniter\Database\Migration;
use Config\Auth;

class AddFieldsToUser extends Migration
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
        $field = [
            'username' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
        ];
        $this->forge->modifyColumn($this->tables['users'], $field);

        $fields = [
            'country_code' => ['type' => 'VARCHAR', 'constraint' => '3', 'null' => true, 'after' => 'username'],
            'last_name'    => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => true, 'after' => 'username'],
            'first_name'   => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => true, 'after' => 'username'],
        ];
        $this->forge->addColumn($this->tables['users'], $fields);
    }

    public function down()
    {
        $field = [
            'username' => ['type' => 'VARCHAR', 'constraint' => '30', 'null' => true],
        ];
        $this->forge->modifyColumn($this->tables['users'], $field);

        $fields = [
            'country_code',
            'first_name',
            'last_name',
        ];
        $this->forge->dropColumn($this->tables['users'], $fields);
    }
}
