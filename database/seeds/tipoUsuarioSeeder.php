<?php

use Illuminate\Database\Seeder;
use App\TipoUsuario;

class tipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoUsuario::create([
            'nombre'=> 'Usuario',
        ]);

        TipoUsuario::create([
            'nombre'=> 'Administrador',
        ]);
    }
}
