<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //CREAR TABLA DE PRODUCTOS
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('imagen');
            $table->string('descripcion');
            $table->decimal('precio', 8, 2);
            $table->integer('stock');
            $table->boolean('estado');
            $table->timestamps();
        });

        //AGREGAR DATOS A LA TABLA DE PRODUCTOS
        DB::table('productos')->insert([
            [
                'nombre' => 'Cepillo de dientes',
                'imagen' => 'resources/images/cepillo-de-dientes.jpg',
                'descripcion' => 'Cepillo color azul para dientes',
                'precio' => 1.99,
                'stock' => 10,
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Enjuague bucal',
                'imagen' => 'resources/images/enjuague-bucal.jpg',
                'descripcion' => 'Enjuague bucal para dientes',
                'precio' => 9.50,
                'stock' => 5,
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //BORRAR TABLA DE PRODUCTOS
        Schema::dropIfExists('productos');
    }
};
