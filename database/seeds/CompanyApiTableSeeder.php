<?php

use Illuminate\Database\Seeder;

class CompanyApiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\CompanyData::class,30)->create();
    }
}
