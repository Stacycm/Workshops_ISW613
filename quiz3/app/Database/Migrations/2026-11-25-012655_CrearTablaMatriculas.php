<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTablaMatriculas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'estudiante' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'identificacion' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
            ],
            'curso_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'fecha_matricula' => [
                'type' => 'DATETIME',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey(
            'curso_id',
            'cursos',
            'id',
            'CASCADE',
            'RESTRICT'
        );

        $this->forge->createTable('matriculas');
    }

    public function down()
    {
        $this->forge->dropTable('matriculas');
    }
}

