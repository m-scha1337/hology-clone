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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        factory(\App\Models\Users::class)->create([
            'email'=>'admin@hology.events',
            'password'=>"admin",
            'uname'=>'admin',
            'verified'=>true,
            'is_admin'=>true,
            'email_verified_at'=>now(),
        ]);
    }
}
