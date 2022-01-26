<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rols = ['admin', 'director', 'guard', 'prisoner'];
        for($i=0; $i<4;$i++){
            Role::create([
                'name'=>$rols[$i]
            ]);
        }
    }
}
