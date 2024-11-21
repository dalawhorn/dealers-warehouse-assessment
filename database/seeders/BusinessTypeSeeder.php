<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\BusinessType;

class BusinessTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $businessTypes = [
            'Corporation',
            'LLC',
            'Sole Proprietor',
            'Other'
        ];

        foreach($businessTypes as $businessType) {
            $businessTypeModel = new BusinessType;
            $businessTypeModel->name = $businessType;
            $businessTypeModel->save();
        }
    }
}
