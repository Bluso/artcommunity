<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('homes')->delete();
        DB::table('homes')->insert([
            'title' => 'เกี่ยวกับเรา',
            'description' => 'มูลนิธิแก้ไขปัญหาการดื่มแอลกอฮอล์ เป็นองค์กรไม่แสวงหากำไรมีเป้าหมายในการส่งเสริมให้ผู้บริโภคมีความรู้ที่ถูกต้องเกี่ยวกับเครื่องดื่มแอลกอฮอล์',
            'keywords' => 'เกี่ยวกับเรา',
            'thumb' => 'thumb_01.png',
            'url' => 'about',
            'created_at' => Carbon::now()->setTimezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->setTimezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
        ]);
        DB::table('homes')->insert([
            'title' => 'ภารกิจของ [มปอ]',
            'description' => 'หน้าที่ของเรา คือ การสร้างความร่วมมือกัน ระหว่างหน่วยงานภาครัฐ ภาคเอกชนและภาคประชาสังคมเพื่อสร้างความรู้ ความเข้าใจเกี่ยวกับเครื่องดื่มแอลกอฮอล์',
            'keywords' => 'ภารกิจ',
            'thumb' => 'thumb_02.png',
            'url' => 'mission',
            'created_at' => Carbon::now()->setTimezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->setTimezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
        ]);
        DB::table('homes')->insert([
            'title' => 'กฏหมายที่เกี่ยวข้อง',
            'description' => 'กฏหมายและระเบียบที่เกี่ยวข้องกับการขับขี่พาหนะการบริโภค การจำหน่าย และการโฆษณาเกี่ยวกับเครื่องดื่มแอลกอฮอล์',
            'keywords' => 'กฏหมายที่เกี่ยวข้อง',
            'thumb' => 'thumb_03.png',
            'url' => 'raw',
            'created_at' => Carbon::now()->setTimezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->setTimezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
        ]);
    }
}
