<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Pais;

class paisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pais = new Pais();
        $pais->nombre = 'Mexico';
        $pais->locale = 'es_MX';
        $pais->save();
        $pais = new Pais();
        $pais->nombre = 'United States';
        $pais->locale = 'en_US';
        $pais->save();
        $pais = new Pais();
        $pais->nombre = 'Canada';
        $pais->locale = 'en_CA';
        $pais->save();

    }
}
