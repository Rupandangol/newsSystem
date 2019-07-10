<?php

use App\Model\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
           'username'=>'rupan',
            'email'=>'rupandangol87@gmail.com',
            'address'=>'kathmandu,Balaju',
            'type'=>'Super Admin',
            'password'=>'$2y$10$cKBTC9VJaFIFpihifFw3r.59dKsPsQgak2kzBI9ycovug2k43o0VO'
        ]);
    }
}
