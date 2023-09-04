<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'nip' => '197804302006041011',
                'name' => 'Maulana Akhmad Riza Hidayat',
                'email' => 'reza.hidayay@yahoo.com',
                'nohp' => '081351850786	',
                'password' => bcrypt('password'),
            ],
            [
                'nip' => '197108172006041026',
                'name' => 'Robi Cahyadi',
                'email' => 'cahyadirobi71@gmail.com',
                'nohp' => '081349499481',
                'password' => bcrypt('password'),
            ],
            [
                'nip' => '197704132006041014',
                'name' => 'Narudin Jangki, SH',
                'email' => 'narudinjangki@gmail.com',
                'nohp' => '081346522546',
                'password' => bcrypt('password'),
            ],
            [
                'nip' => '197407272006041016',
                'name' => 'Rizali',
                'email' => 'rizali.ahmadku@gmail.com',
                'nohp' => '081251384526',
                'password' => bcrypt('password'),
            ],
           
          ];

          foreach($user as $key => $value){
            User::create($value);
          }
    }
}
