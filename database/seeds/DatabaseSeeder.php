<?php

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
        
        factory(\App\Plagues::class, 5)->create();
        factory(\App\Opinions::class, 10)->create();
        factory(\App\Products::class, 10)->create();
        factory(\App\Rid::class, 4)->create();
        factory(\App\User::class)->create(['email' => 'admin@admin.com', 'password'=>bcrypt('123456'), 'type'=>'ad']);
        factory(\App\User::class, 5)->create();
        factory(\App\Likes::class, 5)->create();
        
        
        
        
        
        
        
        
        
        
    }
}
