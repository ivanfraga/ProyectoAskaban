<?php

namespace Database\Seeders;

use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    
    public function run()
    {
        $user_guard = User::where('role_id', 3)->get();

        $user_guard->each(function($user){
            Report::factory()->count(2)->for($user)->create();
        });

        
    }
}
