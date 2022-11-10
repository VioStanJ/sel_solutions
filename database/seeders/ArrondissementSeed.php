<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ArrondissementSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("
            INSERT INTO `arrondissements` (`id`, `nom`, `non`, `departement`) VALUES
            (1, 'Saint-Marc', 'Sen Mmak', 1),
            (2, 'Dessalines', 'Desalin', 1),
            (3, 'Gonaïves', 'Gonayiv', 1),
            (4, 'Gros Morne', 'Gwo Mòn', 1),
            (5, 'Marmelade', 'Manmlad', 1),
            (6, 'Cerca-la-Source', 'Sèka Lasous', 2),
            (7, 'Hinche', 'Ench', 2),
            (8, 'Lascahobas', 'Laskawobas', 2),
            (9, 'Mirebalais', 'Mibalè', 2),
            (10, 'Anse d\'Hainault', 'Ansdeno', 3),
            (11, 'Corail', 'Koray', 3),
            (12, 'Jérémie', 'Jeremi', 3),
            (13, 'Anse-Ã-Veau', 'Ansavo', 4),
            (14, 'Baradères', 'Baradè', 4),
            (15, 'Miragoâne', 'Miragwán', 4),
            (16, 'Acul-du-Nord', 'Lakil dinò', 5),
            (17, 'Borgne', 'Bòny', 5),
            (18, 'Cap-Haïtien', 'Kap Ayisyen', 5),
            (19, 'Grande-Rivière-du-Nord', 'Grann Rivyè dinò', 5),
            (20, 'Limbé', 'Lenbe', 5),
            (21, 'Plaissance', 'Plezans', 5),
            (22, 'Saint-Raphaël', 'Sen Rafayèl', 5),
            (23, 'Fort-Liberté', 'Fòlibète', 6),
            (24, 'Ouanaminthe', 'Wanament', 6),
            (25, 'Trou-du-Nord', 'Twou dinò', 6),
            (26, 'Vallières', 'Valyè', 6),
            (27, 'Moele-Saint-Nicolas', 'Mòl Sen Nikola', 7),
            (28, 'Port-de-Paix', 'Pòdpè', 7),
            (29, 'Saint-Louis-du-Nord', 'Sen Lwi dinò', 7),
            (30, 'Arcahaie', 'Lakayè', 8),
            (31, 'Croix-des-Bouquets', 'Kwadèbouke', 8),
            (32, 'La Gonâve', 'Lagonav', 8),
            (33, 'Léogâne', 'Leyogán', 8),
            (34, 'Port-au-Prince', 'Pòtoprens', 8),
            (35, 'Bainet', 'Benè', 9),
            (36, 'Belle-Anse', 'Bèlans', 9),
            (37, 'Jacmel', 'Jakmèl', 9),
            (38, 'Aquin', 'Aken', 10),
            (39, 'Les Cayes', 'Okay', 10),
            (40, 'Chardonnières', 'Chadonyè', 10),
            (41, 'Coeteaux', '   Koto', 10),
            (42, 'Port-Salut', 'Pòsali', 10)
        ");
    }
}
