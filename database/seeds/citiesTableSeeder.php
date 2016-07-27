<?php

use Illuminate\Database\Seeder;
use App\City;
use League\Csv\Reader;
use Illuminate\Support\Facades\DB;

class citiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        //$reader = Reader::createFromFileObject(new SplFileObject('countriesTest.csv'));

        $filetext = '/home/vagrant/Sites/Hapning/public/allCountries.txt';

        //$handle = fopen($filetext, "r");

///////////////////////////



        if (($handle = fopen($filetext, "r")) !== FALSE) {




            while (($row = fgetcsv($handle, 0, "\t")) !== FALSE) {



                City::create([

                    'country' => $row[0],
                    'postal_code' => $row[1],
                    'city' => $row[2],
                    'state' => $row[3],
                    'state_abbrev' => $row[4],
                    'county' => $row[5],
                    'county_abbrev' => $row[6],
                    'community' => $row[7],
                    'community_code' => $row[8]
                ]);



            }
            fclose($handle);
        }









    }
}
