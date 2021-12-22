<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
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
                'uuid'  => '412c0823-d1e6-4716-afef-d4bf999b7b7e',
                'title_first'  => 'RESIDENTIAL',
                'title_last'  => 'DESIGN',
                'description'  => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.',
                'image'  => 'service_image.jpg',
                'priority'  => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid'  => '858a06c4-b34f-45ee-84fb-516e31c7f403',
                'title_first'  => 'OFFICE',
                'title_last'  => 'DESIGN',
                'description'  => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.',
                'image'  => 'service_image.jpg',
                'priority'  => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid'  => '1341ee18-a87e-47de-8338-18043cbe1dad',
                'title_first'  => 'COMMERCIAL',
                'title_last'  => 'DESIGN',
                'description'  => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.',
                'image'  => 'service_image.jpg',
                'priority'  => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        Service::insert($data);
    }
}
