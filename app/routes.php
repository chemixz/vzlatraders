<?php



Route::get('login', 'AuthController@showLogin');
Route::get('signup', 'AuthController@showsignup');
Route::post('signup', 'AuthController@store');
Route::get('profile/edit/{id}', 'AuthController@edit');
Route::post('profile/update/{id}', 'AuthController@update');
Route::get('profile/{id}', 'AuthController@show');

// Validamos los datos de inicio de sesión.
Route::post('login', 'AuthController@postLogin');

// Nos indica que las rutas que están dentro de él sólo serán mostradas si antes el usuario se ha autenticado.
Route::group(array('before' => 'auth'), function()
{
	// Esta será nuestra ruta de bienvenida.
	Route::get('/', 'PublicationsController@index');
	Route::post('state', 'PublicationsController@setSession');
	Route::get('publications/new', 'PublicationsController@create');
	Route::post('publications/store', 'PublicationsController@store');
	Route::get('publications/show/{id}', 'PublicationsController@show');

	Route::get('publications/edit/{id}', 'PublicationsController@edit');
	Route::get('publications/destroy/{id}', 'PublicationsController@destroy');
	Route::post('publications/update/{id}','PublicationsController@update');

	Route::get('comments', 'CommentsController@index');
	Route::post('comments/store/{id}', 'CommentsController@store');

	// Esta ruta nos servirá para cerrar sesión.
	Route::get('logout', 'AuthController@logOut');

	Route::group(array('before' => 'isAdmin'), function()
	{	

		Route::get('categories', 'CategoriesController@index');
		Route::get('categories/new', 'CategoriesController@create');
		Route::get('categories/edit/{id}', 'CategoriesController@edit');
		Route::post('categories/update/{id}', 'CategoriesController@update');
		Route::post('categories/store', 'CategoriesController@store');
		Route::get('categories/destroy/{id}', 'CategoriesController@destroy');

		Route::get('states/', 'StatesController@index');
		Route::get('states/new', 'StatesController@create');
		Route::get('states/edit/{id}', 'StatesController@edit');
		Route::post('states/update/{id}', 'StatesController@update');
		Route::post('states/store', 'StatesController@store');
		Route::get('states/destroy/{id}', 'StatesController@destroy');



		// Route::get('publications', 'PublicationsController@index');




	});

});