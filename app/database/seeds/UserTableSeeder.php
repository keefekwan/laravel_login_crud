<?php

// app/database/seeds/UserTableSeeder.php

class UserTableSeeder extends Seeder {
	
	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'name' 	   => 'john doe',
			'username' => 'jdoe',
			'email'    => 'jdoe@localhost.com',
			'password' => Hash::make('abc123')
		));
	}

}



?>
