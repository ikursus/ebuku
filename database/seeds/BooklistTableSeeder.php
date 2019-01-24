<?php

use Illuminate\Database\Seeder;

class BooklistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Buku 1
        DB::table('booklist')->insert([
            'title' => 'Ebook 1',
            'description' => 'Sample Description',
            'price' => 23.50
        ]);

        # Buku 2
        DB::table('booklist')->insert([
            'title' => 'Ebook 2',
            'description' => 'Sample Description',
            'price' => 33.50
        ]);

        # Buku 3
        DB::table('booklist')->insert([
            'title' => 'Ebook 3',
            'description' => 'Sample Description',
            'price' => 43.50
        ]);

        # Buku 4
        DB::table('booklist')->insert([
            'title' => 'Ebook 4',
            'description' => 'Sample Description',
            'price' => 43.50
        ]);

        # Buku 5
        DB::table('booklist')->insert([
            'title' => 'Ebook 5',
            'description' => 'Sample Description',
            'price' => 53.50
        ]);

    }
}
