<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTablaCursos extends Migration
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
            'nombre' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'codigo' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
            ],
            'creditos' => [
                'type' => 'INT',
                'constraint' => 3,
            ],
            'carrera_id' => [
                'type'     => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('codigo', false, true);
        $this->forge->addForeignKey(
            'carrera_id',
            'carreras',
            'id',
            'CASCADE',
            'RESTRICT'
        );

        $this->forge->createTable('cursos');
    }

    public function down()
    {
        $this->forge->dropTable('cursos');
    }
}
