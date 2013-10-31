<?php
class PostTableSeeder extends Seeder {

    public function run()
    {
        DB::table('posts')->delete();

        Post::create(array('domain' => 'google.com',
        					'url' => 'http://www.cyber-duck.co.uk',
        				   'title' => 'This is my test title',
        				   'content' => 'Dummy content',
        				   'user_id' => '1',
        				   ));
    }

}