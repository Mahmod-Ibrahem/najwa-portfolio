<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'url' => 'https://salla.sa/aoun-educational/DGRvrEB',
                'is_published' => true,
            ],
            [
                'url' => 'https://salla.sa/aoun-educational/ZYvjKez',
                'is_published' => true,
            ],
            [
                'url' => 'https://salla.sa/aoun-educational/onVzdjE',
                'is_published' => true,
            ],
            [
                'url' => 'https://salla.sa/aoun-educational/KjegzQq',
                'is_published' => true,
            ],
            [
                'url' => 'https://salla.sa/aoun-educational/RAogPbD',
                'is_published' => true,
            ],
            [
                'url' => 'https://salla.sa/aoun-educational/NKznpEe',
                'is_published' => true,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
