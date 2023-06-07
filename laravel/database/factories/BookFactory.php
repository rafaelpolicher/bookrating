<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {            
        $genres = ['Biografia', 'Ficção', 'Aventura', 'Drama', 'Novela', 'HQ', 'Infantil', 'Romance', 'Terror', 'Acadêmico', 'Religioso', 'Auto Ajuda', 'Clássico', 'Não-Ficçao', 'Outros'];
        
        $nome = $this->faker->unique()->sentence();
        return [

                
                    'title' => $nome,
                    'author' => $this->faker->unique()->sentence(),
                    'editor_rating' => $this->faker->numberBetween(1, 10),
                    'genre' => $this->faker->randomElement($genres),
                    'id_user' => 2,
                    'slug' => Str::slug($nome),
                    'image' => $this->faker->imageUrl(400, 400),
                    'review' => $this->faker->paragraph(4)
        ];
    }
}
