<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Licence;

class LicenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $licences = [
            [
                'title' => 'رخصة مزاولة مهنة التدريب',
                'licence_number' => 'TRN-2024-001',
            ],
            [
                'title' => 'رخصة استشارات هندسية',
                'licence_number' => 'ENG-9988-221',
            ],
            [
                'title' => 'اعتماد الجودة العالمي ISO',
                'licence_number' => 'ISO-9001-2026',
            ],
            [
                'title' => 'رخصة المزاولة الطبية',
                'licence_number' => 'MED-1122-334',
            ],
        ];

        foreach ($licences as $licence) {
            Licence::updateOrCreate(
                ['licence_number' => $licence['licence_number']],
                $licence
            );
        }
    }
}
