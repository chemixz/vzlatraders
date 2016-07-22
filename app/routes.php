<?php



Route::get('login', 'AuthController@showLogin');
Route::get('signup', 'AuthController@showsignup');
Route::post('signup', 'AuthController@store');
Route::get('confirm/account/{confirmationcode}' ,'AuthController@confirm');
// Route::get('states/ajax/{id}', 'StatesController@ajax');
Route::get('states/ajax/{id}', function($id)
{
	// dd($id);
  	$states = State::find($id);
	return Response::json($states->municipalities);
});

// Validamos los datos de inicio de sesión.
Route::post('login', 'AuthController@postLogin');

// Nos indica que las rutas que están dentro de él sólo serán mostradas si antes el usuario se ha autenticado.
Route::group(array('before' => 'auth'), function()
{
	// Esta será nuestra ruta de bienvenida.
	Route::get('/', 'HomeController@index');


	Route::get('profile/edit/{id}', 'AuthController@edit');
	Route::post('profile/update/{id}', 'AuthController@update');
	Route::get('profile', 'AuthController@show');

	
	Route::get('publications', 'PublicationsController@index');
	Route::post('select_state', 'PublicationsController@set_select_session');
	Route::post('select_cat', 'PublicationsController@set_select_cat');

	Route::get('mypublications', 'PublicationsController@mypublications');


	Route::get('publications/new', 'PublicationsController@create');
	Route::post('publications/store', 'PublicationsController@store');
	Route::get('publications/show/{id}', 'PublicationsController@show');
	Route::get('publications/edit/{id}', 'PublicationsController@edit');
	Route::post('publications/update/{id}','PublicationsController@update');
	// Route::get('publications/destroy/{id}', 'PublicationsController@destroy');

	
	Route::post('comments/store/{id}', 'CommentsController@store');
	Route::get('comments/destroy/{id}', 'CommentsController@destroy');
	Route::get('comments/edit/{id}', 'CommentsController@edit');
	Route::post('comments/update/{id}', 'CommentsController@update');
	
	Route::post('proposals/store/{id}', 'ProposalsController@store');
	Route::get('proposals/destroy/{id}', 'ProposalsController@destroy');
	Route::get('proposals/edit/{id}', 'ProposalsController@edit');
	Route::post('proposals/update/{id}', 'ProposalsController@update');

	Route::get('exchanges/new/{id}', 'ExchangesController@newEx');
	Route::get('exchanges/show/{id}', 'ExchangesController@show');
	Route::get('exchanges/complete/{id}' ,'ExchangesController@completeEx');

	Route::get('galleries', 'GalleriesController@index');
	Route::get('galleries/new', 'GalleriesController@create');
	Route::post('galleries/store', 'GalleriesController@store');

	Route::get('galleries/ajax/', function()
	{
		// dd($id);
	  	$galleries = Gallery::all();
		return Response::json($galleries);
	});

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