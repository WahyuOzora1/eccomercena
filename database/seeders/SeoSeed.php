<?php

namespace Database\Seeders;

use App\Models\Seo;
use Illuminate\Database\Seeder;

class SeoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'meta_title' => 'E Commerce',
            'meta_author' => 'E Commerce Admin',
            'meta_keyword' => 'E Commerce',
            'meta_description' => 'E Commerce',
            'google_analytics' => 'Google Analytics'
        ];

        Seo::create($data);
    }
}
