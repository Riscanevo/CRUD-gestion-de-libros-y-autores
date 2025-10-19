<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crear autores
        $garciaMarquez = Author::create([
            'name' => 'Gabriel García Márquez',
            'nationality' => 'Colombiano',
        ]);

        $cervantes = Author::create([
            'name' => 'Miguel de Cervantes',
            'nationality' => 'Español',
        ]);

        $borges = Author::create([
            'name' => 'Jorge Luis Borges',
            'nationality' => 'Argentino',
        ]);

        $allende = Author::create([
            'name' => 'Isabel Allende',
            'nationality' => 'Chilena',
        ]);

        $cortazar = Author::create([
            'name' => 'Julio Cortázar',
            'nationality' => 'Argentino',
        ]);

        // Crear libros
        Book::create([
            'title' => 'Cien años de soledad',
            'year' => 1967,
            'author_id' => $garciaMarquez->id,
        ]);

        Book::create([
            'title' => 'El amor en los tiempos del cólera',
            'year' => 1985,
            'author_id' => $garciaMarquez->id,
        ]);

        Book::create([
            'title' => 'Don Quijote de la Mancha',
            'year' => 1605,
            'author_id' => $cervantes->id,
        ]);

        Book::create([
            'title' => 'Ficciones',
            'year' => 1944,
            'author_id' => $borges->id,
        ]);

        Book::create([
            'title' => 'El Aleph',
            'year' => 1949,
            'author_id' => $borges->id,
        ]);

        Book::create([
            'title' => 'La casa de los espíritus',
            'year' => 1982,
            'author_id' => $allende->id,
        ]);

        Book::create([
            'title' => 'Rayuela',
            'year' => 1963,
            'author_id' => $cortazar->id,
        ]);

        // Crear usuario de prueba
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
        ]);
    }
}