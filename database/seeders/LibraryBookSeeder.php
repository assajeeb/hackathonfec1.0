<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibraryBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookTitles = [
            "The Great Gatsby", "To Kill a Mockingbird", "1984", "Moby-Dick", "Pride and Prejudice",
            "War and Peace", "The Catcher in the Rye", "The Lord of the Rings", "The Hobbit", "Brave New World",
            "Crime and Punishment", "The Odyssey", "Frankenstein", "Harry Potter and the Sorcerer's Stone",
            "The Da Vinci Code", "The Alchemist", "Alice's Adventures in Wonderland", "Dune", "Fahrenheit 451",
            "The Hunger Games", "The Chronicles of Narnia", "Jane Eyre", "Dracula", "The Kite Runner"
        ];
        for($i = 0; $i<50;$i++){
            $copiesLeft = random_int(0, 10);
            DB::table('Library_book')->insert([
                'isbn' => random_int(1000000000000, 9999999999999), // Random 10-digit ISBN
                'title' => $bookTitles[array_rand($bookTitles)], // Pick a random book title
                'available' => $copiesLeft>0, // Random true/false
                'copies_left' => $copiesLeft,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
