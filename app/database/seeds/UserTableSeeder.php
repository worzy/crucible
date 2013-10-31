<?php
class UserTableSeeder extends Seeder {

    public function run()
    {
    	DB::table('users')->delete();

        Sentry::createUser(array(
	        'email'    => 'john.doe@example.com',
	        'password' => 'test',
	    ));

    }

}