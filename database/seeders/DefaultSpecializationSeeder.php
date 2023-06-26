<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Seeder;

class DefaultSpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $input = [
            [
                'name' => 'Wi-Fi',
            ],
            [
                'name' => 'Desk',
            ],
            [
                'name' => 'Air Conditioning',
            ],
            [
                'name' => 'Refrigerator',
            ],
            [
                'name' => 'Shower Facilities',
            ],
            [
                'name' => 'Electric Kettle',
            ],
            [
                'name' => 'Toilets',
            ],
            [
                'name' => 'Sofa',
            ],
            [
                'name' => 'Telephone',
            ],
            [
                'name' => 'Toiltries',
            ],
            [
                'name' => 'Wardrobe',
            ],
            [
                'name' => 'Telivision',
            ],
        ];

        foreach ($input as $data) {
            Specialization::create($data);
        }
    }
}
