<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $users =  factory(\App\User::class,30)->create();
       $users->each(function (){
          $threads = factory(\App\Thread::class,10)->create(['user_id'=>rand(1,30)]);
          $threads->each(function ($thread){
               factory(\App\Reply::class,10)->create(['thread_id'=>$thread->id,'user_id'=>rand(1,30)]);
          });
       });
    }
}
