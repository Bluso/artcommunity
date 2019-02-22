<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AboutHistoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about_histories')->delete();
        DB::table('about_histories')->insert([
            'detail' => '<h1>มูลนิธิแก้ไขปัญหาการดื่มแอลกอฮอล์ หรือ มปอ. (Thai Foundation For Responsible Drinking: TFRD) 
                            เป็นองค์กรไม่แสวงหากำไร ก่อตั้งขึ้นใน พ.ศ. 2554 โดยการสนับสนุนของผู้ประกอบธุรกิจเครื่องดื่มแอลกอฮอล์</h1>
                           <p>
                           <br>
                            มีเป้าหมายในการสนับสนุนและส่งเสริมการรณรงค์ให้ผู้บริโภคมีความรู้และความเข้าใจที่ถูกต้องเกี่ยวกับเครื่องดื่ม
                            แอลกอฮอล์ มีความตระหนักรู้ถึงผลกระทบของเครื่องดื่มแอลกอฮอล์ที่มีต่อร่างกาย และรู้เท่าทันแอลกอฮอล์
                            เพื่อสามารถปรับเปลี่ยนพฤติกรรมการบริโภคเครื่องดื่มแอลกอฮอล์ให้เป็นไปอย่างมีความรับผิดชอบต่อตนเอง 
                            ครอบครัวและสังคม 
                            <br><br>
                            ซึ่งจะนำไปสู่การลดปัญหาที่สืบเนื่องจากการดื่มเครื่องดื่มแอลกอฮอล์อย่างเป็นอันตราย (Harmful Use of Alcohol) 
                            อันได้แก่ การดื่มก่อนวัยอันควร หรือการดื่มเครื่องดื่มแอลกอฮอล์ก่อนอายุ 20 ปีบริบูรณ์ การดื่มมากเกินควร 
                            และเมาแล้วขับ อย่างบูรณาการและยั่งยืนต่อไป
                            </p>',
            'image' => 'image-about-01.png',
            'created_at' => Carbon::now()->setTimezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->setTimezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
        ]);
    }
}
