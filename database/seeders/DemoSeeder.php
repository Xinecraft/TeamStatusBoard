<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->withPersonalTeam()->count(10)->create();

        $team = Team::factory()->create([
            'personal_team' => false
        ]);

        $users = User::all();
        foreach ($users as $user) {
            $team->users()->attach(
                $user, ['role' => 'member']
            );
        }
    }
}
