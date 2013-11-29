<?php
class UserTableSeeder extends Seeder {

    public function run()
    {
    	DB::table('users')->delete();

        Sentry::createUser(array(
	        'email'    => 'garethdrew@gmail.com',
	        'password' => 'test',
	        'first_name' => 'Gareth',
	        'last_name'	=> 'Drew',
	        'activated' => 1,
	    ));

	    Sentry::createUser(array(
	        'email'    => 'gareth@cyber-duck.co.uk',
	        'password' => 'test',
	        'first_name' => 'Joe',
	        'last_name'	=> 'Blogs',
	        'activated' => 1,
	    ));

    }

}