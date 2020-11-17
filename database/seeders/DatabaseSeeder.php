<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(15)->create();

        // Populate the pivot table
        User::all()->each(function ($user) {
            $user->favouriteContacts()->attach(
                User::all()
                    ->where('id','!=',$user->id)
                    ->random(rand(1, 5))
                    ->pluck('id')
                    ->toArray()
            );
        });
    }
}
