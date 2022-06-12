<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ListBook;

class listbookseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ListBook::create([
            'title' => 'harry potter',
            'genre' => 'fiksi',
            'sinopsis' => 'buku penyihir asal dari london',
            'rating' => 4.3,
            'status' => 'available'
        ]);
        ListBook::create([
            'title' => 'mr bean',
            'genre' => 'comedy',
            'sinopsis' => 'buku comedy ala mr.bean',
            'rating' => 4,
            'status' => 'available'
        ]);
        ListBook::create([
            'title' => 'romeo & juliet',
            'genre' => 'romance',
            'sinopsis' => 'cerita romantis dijamin bikin baper',
            'rating' => 4.9,
            'status' => 'available'
        ]);
    }
}
