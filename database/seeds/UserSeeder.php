<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(\App\User::class)->create([
            'email' => 'huy@gmail.com',
            'name' => 'huy',
            'role' => 'admin'
        ]);
        factory(\App\User::class)->create([
            'email' => 'nguyenlehuyuit@gmail.com',
            'name' => 'huy nguyen',
            'role' => 'admin'
        ]);

           factory(\App\User::class, 5)->create();

        foreach(\App\User::all() as $user){
            $user->profile()->save(factory(\App\Profile::class)->make());
        }

    }
}
