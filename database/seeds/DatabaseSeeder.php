<?php

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
        $this->call(HomeTableSeeder::class);
        $this->call(AboutHistoryTableSeeder::class);
        $this->call(LogoTableSeeder::class);
    }
}
