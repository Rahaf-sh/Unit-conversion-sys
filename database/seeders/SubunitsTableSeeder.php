<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subunit;

class SubunitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subunit::create([
            'subunit' => 'Milliliters',
            'ratio'   => '1000',
            'unit_id' => 1
        ]);
    }
}
