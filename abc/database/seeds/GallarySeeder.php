<?php

use App\Gallery;
use Illuminate\Database\Seeder;

class GallarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Gallery::class, 23)->create();
    }
}
