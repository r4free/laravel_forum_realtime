<?php

use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $threads = factory(\App\Thread::class,30)->create();
        $threads->each(function ($thread){
            factory(\App\Reply::class,rand(5,10))->create(['thread_id'=>$thread->id,'user_id'=>rand(1,30)]);
        });
    }
}
