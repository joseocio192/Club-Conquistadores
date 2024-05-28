<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Pais;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pais = new Pais();
        $pais->nombre = 'Mexico';
        $pais->locale = 'es';
        $pais->save();
        $pais = new Pais();
        $pais->nombre = 'United States';
        $pais->locale = 'en';
        $pais->save();
        $pais = new Pais();
        $pais->nombre = 'Canada';
        $pais->locale = 'en';
        $pais->save();

        $pais = new Pais();
        $pais->nombre = '한국어';
        $pais->locale = 'ko';
        $pais->save();

        $pais = new Pais();
        $pais->nombre = '日本語';
        $pais->locale = 'ja';
        $pais->save();

        $pais = new Pais();
        $pais->nombre = '简体中文';
        $pais->locale = 'zh-hans';
        $pais->save();

        $pais = new Pais();
        $pais->nombre = '繁體中文';
        $pais->locale = 'zh-hant';
        $pais->save();

        $pais = new Pais();
        $pais->nombre = 'Français';
        $pais->locale = 'fr';
        $pais->save();
    }
}
