<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LogoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('logos')->delete();
        DB::table('logos')->insert([
            'logo' => '1555062144.png',
            'title_th' => 'ชื่อภาษาไทย',
            'title_en' => 'ชื่อภาษาอังกฤษ',
            'created_at' => Carbon::now()->setTimezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->setTimezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
        ]);
    }
}
