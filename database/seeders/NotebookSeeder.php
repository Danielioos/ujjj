<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotebookSeeder extends Seeder
{
    public function run(): void
    {
        $tablak = ['processzor', 'oprendszer', 'gep'];

        foreach ($tablak as $tabla) {
            $fajl = database_path('seeders/data/' . $tabla . '.json');
            $sorok = json_decode(file_get_contents($fajl), true);

            foreach (array_chunk($sorok, 100) as $csomag) {
                $adatok = [];

                foreach ($csomag as $sor) {
                    foreach ($sor as $kulcs => $ertek) {
                        if ($ertek === '') {
                            $sor[$kulcs] = null;
                        } elseif (in_array($kulcs, ['id', 'memoria', 'merevlemez', 'ar', 'processzorid', 'oprendszerid', 'db'], true)) {
                            $sor[$kulcs] = (int) $ertek;
                        }
                    }

                    $adatok[] = $sor;
                }

                DB::table($tabla)->insert($adatok);
            }
        }
    }
}
