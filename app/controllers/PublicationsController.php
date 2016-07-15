<?php

class PublicationsController extends \BaseController {

	/**
	 * Display a listing of publications
	 *
	 * @return Response
	 */
	public function index()
	{	

		// dd(count($array[1]['municipios']));
		$states = State::all();
		$categories = Category::all();
		// $publications = Publication::all();
		$sessionid = Session::get('state_id');
		$municipalities = Municipality::where('state_id','=',Session::get('state_id'))->orderBy(DB::raw('RAND()'))->get();
		
		return View::make('principal.index', compact('municipalities','states','categories'));
	}
	public function set_select_session(){
		Session::forget('state_id');
		$session = Input::get('state_id');
        Session::put('state_id',$session);
        return Redirect::to('/');
	}
	public function set_select_cat(){
		Session::forget('category_id');
		$cat = Input::get('category_id');
        Session::put('category_id',$cat);
        return Redirect::to('/');
	}


	/**
	 * Show the form for creating a new publication
	 *
	 * @return Response
	 */
	public function create()
	{
		$states = State::all();
		if ( count($states)<1) {
			Session::flash('message','No hay estados registrados aun');
			Session::flash('class','warning');
			return Redirect::to('/');
		}
		$categories = Category::all();
		if ( count($categories)< 1) {
			Session::flash('message','No hay categorias registradas aun');
			Session::flash('class','warning');
			return Redirect::to('/');
		}
		// dd($states);
		return View::make('publications.create',compact('states','categories'));
	}

	/**
	 * Store a newly created publication in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$validator = Validator::make($data = Input::all(), Publication::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		if (Input::file('picture'))
		 {
			$file = Input::file('picture');		

			$destinationPath = 'uploads/images/publications/'.Auth::user()->id.'/';
			// File::makeDirectory($destinationPath, $mode = 0777, true, true);
			$filename = 'profile_'.Auth::user()->id.'_'.Str::random(20).'_'.Auth::user()->id .'.'. $file->getClientOriginalExtension();
			$mimeType = $file->getMimeType();
			$extension = $file->getClientOriginalExtension();
			$upload_success = $file->move($destinationPath,$filename);
			
			// if($familia->picture!='package.png')
			// {
			// 	File::delete($destinationPath.$familia->picture);
			// }
			$data['picture'] = $filename;
							
		}
		else
		{
			unset($data['picture']);
		}
	
		Publication::create($data);
		Session::flash('message','Publicacion creada correctamente');
		Session::flash('class','success');
		return Redirect::to('/');

	}

	/**
	 * Display the specified publication.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$publication = Publication::findOrFail($id);
		$comments = Comment::where('publication_id', '=',$id )->orderBy('id','DESC')->get();
		return View::make('publications.show', compact('publication','comments'));
	}

	/**
	 * Show the form for editing the specified publication.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if ($this->verify_user($id) == false) {
			Session::flash('message','No tienes permiso para eso');
			Session::flash('class','danger');
			return Redirect::to('/');
		}
		
		$publication = Publication::find($id);
		// dd($publication->picture);
		$municipalities = Municipality::all();
		$states = State::all();
		$categories = Category::all();

		return View::make('publications.edit', compact('publication','states','categories','municipalities'));
	}
	public function verify_user ($value){
		if (Publication::find($value)->user->id == Auth::user()->id) {
			return true;
		}
		else
		{
			return false;
		};
		
	}
	/**
	 * Update the specified publication in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$publication = Publication::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Publication::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		if (Input::file('picture'))
		 {
			$file = Input::file('picture');		

			$destinationPath = 'uploads/images/publications/'.Auth::user()->id.'/';
			$filename = 'profile_'.Auth::user()->id.'_'.Str::random(20).'_'.Auth::user()->id .'.'. $file->getClientOriginalExtension();
			// $filename = Str::random(20).'_'.Auth::user()->id .'.'. $file->getClientOriginalExtension();
			$mimeType = $file->getMimeType();
			$extension = $file->getClientOriginalExtension();
			$upload_success = $file->move($destinationPath,$filename);
			File::delete($destinationPath.$publication->picture);
			
			$data['picture'] = $filename;
							
		}
		else
		{
			unset($data['picture']);
		}

		$publication->update($data);

		return Redirect::to('/');
	}

	/**
	 * Remove the specified publication from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Publication::destroy($id);

		return Redirect::to('/');
	}

}
