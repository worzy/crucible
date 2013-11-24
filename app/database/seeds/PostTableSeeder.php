<?php
class PostTableSeeder extends Seeder {

    public function run()
    {
        DB::table('posts')->delete();
        DB::table('comments')->delete();

        $date = \Carbon\Carbon::now();

        $id = DB::table('posts')->insertGetId(array('domain' => 'cyber-duck.co.uk',
                                					'url' => 'http://www.cyber-duck.co.uk',
                                				    'title' => 'Awesome digital agency',
                                				    'content' => 'Dummy content',
                                				    'user_id' => '1',
                                                    'created_at' => $date,
                                                    'updated_at' => $date,
                                				   ));

        DB::table('comments')->insert(array('user_id' => 1,
                                            'content' => 'This is a comment',
                                            'post_id' => $id,
                                            'created_at' => $date,
                                            'updated_at' => $date,
                                           ));

        DB::table('comments')->insert(array('user_id' => 1,
                                            'content' => 'This is another comment',
                                            'post_id' => $id,
                                            'created_at' => $date,
                                            'updated_at' => $date,
                                           ));

        $id = DB::table('posts')->insertGetId(array('domain' => 'google.com',
                                                    'url' => 'http://www.google.co.uk',
                                                    'title' => 'Very useful service',
                                                    'content' => 'Dummy content',
                                                    'user_id' => '2',
                                                    'created_at' => $date,
                                                    'updated_at' => $date,
                                                   ));

        DB::table('comments')->insert(array('user_id' => 1,
                                            'content' => 'This is another comment',
                                            'post_id' => $id,
                                            'created_at' => $date,
                                            'updated_at' => $date,
                                           ));

        DB::table('comments')->insert(array('user_id' => 1,
                                            'content' => 'This is another comment',
                                            'post_id' => $id,
                                            'created_at' => $date,
                                            'updated_at' => $date,
                                           ));
    }

}