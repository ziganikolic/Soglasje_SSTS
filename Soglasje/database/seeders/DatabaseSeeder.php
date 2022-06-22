<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            KategorijaSeeder::class,
            PrivolitevSeeder::class,
            // Kategorija_privolitev::class,
        ]);

        // $kategorije = Kategorija::all();
        // Privolitev::all()->each(function ($privolitev) use ($kategorije){
        //     $privolitev->kategorija()->attach(
        //         $kategorije->pluck('id')->toArray()   
        //     );
        // });
    }
}
        
        
