<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DepartementSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("
            INSERT INTO `departements` (`id`, `nom`, `non`) VALUES
            (1, 'Artibonite', 'Latibonit'),
            (2, 'Centre', 'Sant'),
            (3, 'Grand\'Anse', 'Grandans'),
            (4, 'Nippes', 'Nip'),
            (5, 'Nord', 'Nò'),
            (6, 'Nord-Est', 'Nòdès'),
            (7, 'Nord-Ouest', 'Nòdwès'),
            (8, 'Ouest', 'Lwès'),
            (9, 'Sud-Est', 'Sidès'),
            (10, 'Sud', 'Sid')
        ");
    }
}
