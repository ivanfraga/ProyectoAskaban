<?php

namespace Database\Seeders;
use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        $users->each(function ($user) {
            $user->image()->create([
                'path' => "https://ui-avatars.com/api/?name=$user->first_name+$user->last_name&size=128"
            ]);
        });


        $reports = Report::all();

        $reports->each(function ($report) {
            $report->image()->create([
                'path' => "https://picsum.photos/id/$report->id/200/300"
            ]);
        });
    }
}
