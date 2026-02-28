<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Productos>
 */
class ProductosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Obtenemos todas las imágenes del directorio
        $imagenes = Storage::disk('public')->files('productos');

        // Filtramos solo archivos que parezcan imágenes (opcional pero recomendado)
        $imagenesValidas = array_filter($imagenes, function ($path) {
            return in_array(strtolower(pathinfo($path, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'webp', 'gif']);
        });

        // Si no hay imágenes, usamos el placeholder
        $imagenAleatoria = !empty($imagenesValidas)
            ? 'storage/' . $imagenesValidas[array_rand($imagenesValidas)]
            : 'storage/productos/product-placeholder.png';

        return [
            'nombre' => fake()->name(),
            'descripcion' => fake()->text(100),
            'precio' => fake()->randomFloat(2, 0, 100),
            'stock' => fake()->randomNumber(2),
            'estado' => true,
            'imagen' => $imagenAleatoria
        ];
    }
}
