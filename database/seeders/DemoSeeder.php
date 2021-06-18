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
        $tenants = Team::factory()->count(3)->create();

        foreach ($tenants as $tenant)
        {
            User::factory()->withPersonalTeam()->count(5)->create();
        }
    }
}
