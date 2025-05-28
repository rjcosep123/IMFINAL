<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ward;

class WardsTableSeeder extends Seeder
{
    public function run()
    {
        $wards = [
            ['ward_name' => 'Orthopedic Ward', 'location' => '2nd Floor', 'total_beds' => 20, 'extension_number' => '7711'],
            ['ward_name' => 'General Surgery', 'location' => '3rd Floor', 'total_beds' => 20, 'extension_number' => '7712'],
            ['ward_name' => 'ICU Ward', 'location' => '1st Floor', 'total_beds' => 20, 'extension_number' => '7713'],
            ['ward_name' => 'Pediatric Ward', 'location' => '4th Floor', 'total_beds' => 20, 'extension_number' => '7714'],
            ['ward_name' => 'Maternity Ward', 'location' => '3rd Floor', 'total_beds' => 20, 'extension_number' => '7715'],
            ['ward_name' => 'Cardiology Ward', 'location' => '2nd Floor', 'total_beds' => 20, 'extension_number' => '7716'],
            ['ward_name' => 'Neurology Ward', 'location' => '4th Floor', 'total_beds' => 20, 'extension_number' => '7717'],
            ['ward_name' => 'Oncology Ward', 'location' => '3rd Floor', 'total_beds' => 20, 'extension_number' => '7718'],
            ['ward_name' => 'Emergency Observation', 'location' => '1st Floor', 'total_beds' => 20, 'extension_number' => '7719'],
            ['ward_name' => 'Recovery Ward', 'location' => '2nd Floor', 'total_beds' => 20, 'extension_number' => '7720'],
            ['ward_name' => 'Isolation Ward', 'location' => '1st Floor', 'total_beds' => 20, 'extension_number' => '7721'],
            ['ward_name' => 'Burn Unit', 'location' => '2nd Floor', 'total_beds' => 20, 'extension_number' => '7722'],
            ['ward_name' => 'Renal Unit', 'location' => '3rd Floor', 'total_beds' => 20, 'extension_number' => '7723'],
            ['ward_name' => 'Geriatric Ward', 'location' => '4th Floor', 'total_beds' => 20, 'extension_number' => '7724'],
            ['ward_name' => 'Psychiatric Ward', 'location' => '1st Floor', 'total_beds' => 20, 'extension_number' => '7725'],
            ['ward_name' => 'Rehabilitation Ward', 'location' => '2nd Floor', 'total_beds' => 20, 'extension_number' => '7726'],
            ['ward_name' => 'Out-Patient Clinic', 'location' => 'Ground Floor', 'total_beds' => 20, 'extension_number' => '7727'],
        ];

        foreach ($wards as $ward) {
            Ward::create([
                'ward_name' => $ward['ward_name'],
                'location' => $ward['location'],
                'total_beds' => $ward['total_beds'],
                'occupied_beds' => 0,
                'extension_number' => $ward['extension_number'],
            ]);
        }
    }
}
