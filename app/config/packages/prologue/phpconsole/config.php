<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Users
	|--------------------------------------------------------------------------
	|
	| Add users in an array as show in the example below. You can add as many
	| users as you like. The nickname will identify a user when sending data to
	| a user's Phpconsole and must be unique.
	|
	*/

	'users' => array(

		'nWidart' => array(
			'user_key'    => 'yaNuoVE89ifdOlwm7VnTnF1LaSiZfE58gPJMYU8BposgWhE75xbtl9hD6ohOKDyE',
			'project_key' => 'KUy4m3qVTXB1LkyPOse8j4BeVuIpvWTKfcJ2lvtLAI60NUDJJg2N3pKQXfnSM6v8',
		),

	),

	/*
	|--------------------------------------------------------------------------
	| Default user
	|--------------------------------------------------------------------------
	|
	| You can set a default user by specifying a user nickname set in the users
	| users array. This is especially usefull for different configuration
	| environments. You can set yourself as default user in your own
	| development environment and the package will automatically set a user
	| cookie for you. Data send to Phpconsole will be automatically send to
	| your own Phpconsole project.
	|
	*/

	'default' => 'nWidart',

);
