<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Migrate extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            // ... other fields ...
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id'); // contoh kunci asing

        $this->forge->createTable('auth_tokens');
    }


    public function down()
    {
        //
    }
}
