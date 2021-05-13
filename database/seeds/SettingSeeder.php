<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Setting::create([
            'site_name' => 'Laravel\'s blog',
            'site_address' => 'Vietnam Ho Chi Minh city',
            'contact_phone' => '094212232',
            'contact_email' => 'laravel@forum.com',
            'about' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque culpa cumque est eum excepturi nihil nisi, pariatur voluptatibus. Dolorum eligendi ex maiores nam obcaecati officiis provident quidem quis quod unde?'
        ]);
    }
}
