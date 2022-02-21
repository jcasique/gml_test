<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CategoriaSeeder extends Seeder
{
    protected $categorias = ['Cliente', 'Proveedor', 'Funcionario Interno'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Categoria::truncate();

        foreach ($this->categorias as $categoria) {
            Categoria::create(['nombre' => $categoria]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
