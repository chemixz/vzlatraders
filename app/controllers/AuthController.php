<?php

class AuthController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Controlador de la autenticación de usuarios
	|--------------------------------------------------------------------------
	*/

	/**
	 * Muestra el formulario para login.
	 */
	public function showLogin()
	{
		$states = State::all();
		// Verificamos que el usuario no esté autenticado
		if (Auth::check())
		{
		    // Si está autenticado lo mandamos a la raíz donde estara el mensaje de bienvenida.
		    return Redirect::to('/');
		}
		// Mostramos la vista login.blade.php (Recordemos que .blade.php se omite.)
		return View::make('login', Compact('states'));
	}


	/**
	 * Valida los datos del usuario.
	 */
	public function postLogin()
	{
		// Guardamos en un arreglo los datos del usuario.
		

		$userdata = array(
            'email' => Input::get('email'),
            'password'=> Input::get('password')
        );
		$search = Input::get('state_id');
        Session::put('state_id',$search);
 		
       	$validator = Validator::make($data = Input::all() , User::$ruleslogin, User::$messageregister);
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        // dd(Session::get('Searcher'));
		// Validamos los datos y además mandamos como un segundo parámetro la opción de recordar el usuario.
        if(Auth::attempt($userdata, Input::get('remember-me', 0)))
        {
        	// De ser datos válidos nos mandara a la bienvenida
        	return Redirect::to('/');
        }
        // En caso de que la autenticación haya fallado manda un mensaje al formulario de login y también regresamos los valores enviados con withInput().
       		Session::flash('message','Tus datos son incorrectos.');
			Session::flash('class','danger');
        return Redirect::to('login')
				    ->withInput();
	}

	public function showsignup()
	{	$states = State::all();
		if (Auth::check())
		{
		    // Si está autenticado lo mandamos a la raíz donde estara el mensaje de bienvenida.
		    return Redirect::to('/');
		}
		// Mostramos la vista login.blade.php (Recordemos que .blade.php se omite.)
		return View::make('signup', Compact('states'));
	
	}
	public function store(){
		// dd(Input::all());
		$user = new User;

		$validator = Validator::make($data = Input::all() , User::$rulesregistro, User::$messageregister);
		// $data['password'] = Hash::make(Input::get('password'));
		// unset($data['cpassword']);
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
			$user->credential=Input::get('credential');
			$user->names=Input::get('names');
			$user->surnames=Input::get('surnames');
			$user->tlf=Input::get('tlf');
			$user->email=Input::get('email');
			$user->municipality_id=Input::get('municipality_id');
			$user->password=Hash::make(Input::get('password'));
		if($user->save())
		{
			Session::flash('message','Guardado Correctamente');
			Session::flash('class','success');
			return Redirect::to('login');
		}
		else
		{
			Session::flash('messager','Ha ocurrido un error');
			Session::flash('class','danger');
			return Redirect::to('signup');
		}
		
	
	}
	public function update($id){

		$user = User::findOrFail($id);

		$validator = Validator::make($data = Input::all() , User::$rulesupdate , User::$messageregister);
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		
		if (Input::file('photo'))
		 {
			$file = Input::file('photo');		
			$destinationPath = 'uploads/images/profiles/'.$user->id.'/';
			$filename = Str::random(20).'_'.$user->id .'.'. $file->getClientOriginalExtension();
			$mimeType = $file->getMimeType();
			$extension = $file->getClientOriginalExtension();
			$upload_success = $file->move($destinationPath,$filename);
			
			if($user->photo!='default_image.jpg')
			{
				File::delete($destinationPath.$user->photo);
			}
			$data['photo'] = $filename;
			
		}
		else
		{
			unset($data['photo']);
		}
		$user->update($data);
		Session::flash('message','Actualizado Correctamente');
		Session::flash('class','success');

		return Redirect::to('/profile/'.$user->id);
	}
	public function edit($id)
	{	
		$municipalities = Municipality::all();
		$states = State::all();
		$user = User::find($id);

		return View::make('editprofile', compact('user','states','municipalities'));
	}

	public function show($id)
	{
		$user = User::findOrFail($id);
		return View::make('profile', compact('user'));
	}
	/**
	 * Muestra el formulario de login mostrando un mensaje de que cerro sesión.
	 */
	public function logOut()
	{
		Session::flush();
		Auth::logout();
		Session::flash('message','Tu sesión ha sido cerrada.');
		Session::flash('class','danger');
		return Redirect::to('login');
					
	}

}