<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Kategorija;          //!!!!!! dodano 

class KategorijaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    
    public function run()
    {
        //Vse kategorije
        $kategorija1 = 'da šola objavi rezultate mojega otroka iz tekmovanj, natečajev, tečajev, taborov in kolonij ter dosežke ob zaključku izobraževanja z imenom in priimkom, oddelkom in šolo:';
        $kategorija2 = 'da šola objavi izdelke, zvočne posnetke, likovna in literarna dela, fotografije izdelkov z imenom, priimkom ter oddelkom in šolo mojega otroka, ki nastanejo v okviru šolskih in obšolskih dejavnosti:';
        $kategorija3 = 'da šola objavi fotografije mojega otroka, ki nastanejo v okviru šolskih in obšolskih dejavnosti:';
        $kategorija4 = 'da šola objavi videoposnetke mojega otroka, ki nastanejo v okviru šolskih in obšolskih dejavnosti:';
        $kategorija5 = 'da šola objavi moje rezultate iz tekmovanj, natečajev, tečajev, taborov in kolonij ter dosežke ob zaključku izobraževanja z imenom in priimkom, oddelkom in šolo:';
        $kategorija6 = 'da šola objavi moje izdelke, zvočne posnetke, likovna in literarna dela, fotografije izdelkov z mojim imenom, priimkom ter oddelkom in šolo, ki nastanejo v okviru šolskih in obšolskih dejavnosti:';
        $kategorija7 = 'da šola objavi moje fotografije, ki nastanejo v okviru šolskih in obšolskih dejavnosti:';
        $kategorija8 = 'da šola objavi moje videoposnetke, ki nastanejo v okviru šolskih in obšolskih dejavnosti:';
        $kategorija9 = 'SOGLASJE  DIJAKA/DIJAKINJE  ZA  ŠPORTNO  VZGOJNI  KARTON';
        $kategorija10 = 'SOGLASJE STARŠEV/SKRBNIKOV – svetovalna služba';
        $kategorija11 = 'PRIVOLITEV STARŠEV/SKRBNIKOV za obdelavo osebnih podatkov';
        
        //array kategorije
        $kategorije = [
            [
                'kategorija_ime' => $kategorija1
            ],
            [
                'kategorija_ime' => $kategorija2   
            ],
            [
                'kategorija_ime' => $kategorija3   
            ],
            [
                'kategorija_ime' => $kategorija4   
            ],
            [
                'kategorija_ime' => $kategorija5   
            ],
            [
                'kategorija_ime' => $kategorija6   
            ],
            [
                'kategorija_ime' => $kategorija7   
            ],
            [
                'kategorija_ime' => $kategorija8   
            ],
            [
                'kategorija_ime' => $kategorija9   
            ],
            [
                'kategorija_ime' => $kategorija10   
            ],
            [
                'kategorija_ime' => $kategorija11
            ],
        ];
        foreach ($kategorije as $kategorija) {
            Kategorija::create($kategorija);
        }
    }
}










