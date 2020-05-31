<?php

use App\SourceType;
use Illuminate\Database\Seeder;

class SourceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        SourceType::create([
            'name' => 'موقع الكتروني',
            'name_en' => 'website'
        ]);
        SourceType::create([
            'name' => 'فيسبوك',
            'name_en' => 'Facebook'
        ]);
        SourceType::create([
            'name' => 'تويتر',
            'name_en' => 'Twitter'
        ]);
        SourceType::create([
            'name' => 'انستجرام',
            'name_en' => 'Instagram'
        ]);



    }
}
