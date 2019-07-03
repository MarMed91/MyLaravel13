<?php

use Illuminate\Database\Seeder;

class ComputerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Computer::class, 15)->create();
    }
}
