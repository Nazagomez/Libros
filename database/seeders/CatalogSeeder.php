<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    public function run(): void
    {
        $silberschatz = Author::query()->create([
            'name' => 'Abraham Silberschatz',
            'nationality' => 'Israelis / American',
            'birth' => 1952,
            'fields' => 'Database Systems, Operating Systems',
        ]);
        $tanenbaum = Author::query()->create([
            'name' => 'Andrew S. Tanenbaum',
            'nationality' => 'Dutch / American',
            'birth' => 1944,
            'fields' => 'Distributed computing, Operating Systems',
        ]);
        $wiley = Publisher::query()->create([
            'name' => 'John Wiley & Sons',
            'country' => 'United States',
            'founded' => 1807,
            'genre' => 'Academic',
        ]);
        $pearson = Publisher::query()->create([
            'name' => 'Pearson Education',
            'country' => 'United Kingdom',
            'founded' => 1844,
            'genre' => 'Education',
        ]);
        Book::query()->insert([
            [
                'title' => 'Operating System Concepts',
                'edition' => '9th',
                'copyright' => 2012,
                'language' => 'ENGLISH',
                'pages' => 976,
                'author_id' => $silberschatz->id,
                'publisher_id' => $wiley->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Database System Concepts',
                'edition' => '6th',
                'copyright' => 2010,
                'language' => 'ENGLISH',
                'pages' => 1376,
                'author_id' => $silberschatz->id,
                'publisher_id' => $wiley->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Computer Networks',
                'edition' => '5th',
                'copyright' => 2010,
                'language' => 'ENGLISH',
                'pages' => 960,
                'author_id' => $tanenbaum->id,
                'publisher_id' => $pearson->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Modern Operating Systems',
                'edition' => '4th',
                'copyright' => 2014,
                'language' => 'ENGLISH',
                'pages' => 1136,
                'author_id' => $tanenbaum->id,
                'publisher_id' => $pearson->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
