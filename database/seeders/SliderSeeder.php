<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'uuid'  => '450d4020-3765-4b60-9f51-d19a1ecdf61e',
                'caption'  => 'FEATURED PROJECT',
                'title'  => 'GREEN INTERIOR',
                'button_text'  => 'Our Portfolio',
                'image'  => 'slider_image.jpg',
                'priority'  => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid'  => '5625637b-a4d1-43b8-b6e1-2b092d00ea8e',
                'caption'  => 'INTERIOR REMODELING TO MAKES',
                'title'  => 'YOUR LIFE EASIER',
                'button_text'  => 'Our Portfolio',
                'image'  => 'slider_image.jpg',
                'priority'  => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid'  => 'a12dc19b-7d26-4d97-bbb7-0f964702cfff',
                'caption'  => 'FEATURED PROJECT',
                'title'  => 'YOUR LIFE EASIER',
                'button_text'  => 'Our Portfolio',
                'image'  => 'slider_image.jpg',
                'priority'  => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        Slider::insert($data);
    }
}
