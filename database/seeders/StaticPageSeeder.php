<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class StaticPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Page::create([
            'key_page' => 'about_us',
            'title' => 'about us',
            'title_ar' => 'من نحن ',
        ]);
            Page::create([
                'key_page' => 'contact_us',
                'title' => 'contact us',
                'title_ar' => 'اتصل بنا ',
            ]);
    }
}
