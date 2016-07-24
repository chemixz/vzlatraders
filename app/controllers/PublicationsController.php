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
		
		return View::make('publications.index', compact('municipalities','states','categories'));
	}
	
	public function set_select_session(){
		Session::forget('state_id');
		$session = Input::get('state_id');
        Session::put('state_id',$session);
        return Redirect::to('/publications');
	}
	public function set_select_cat(){
		Session::forget('category_id');
		$cat = Input::get('category_id');
        Session::put('category_id',$cat);
        return Redirect::to('/publications');
	}

	public function userpublications()
	{
		$publications = Publication::where('user_id','=',Auth::user()->id )->get();
		return View::make('userpublications.index', compact('publications'));

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
		// dd(Input::all());
		$validator = Validator::make($data = Input::all(), Publication::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		
		$destinationPath = 'uploads/images/publications/user_'.Auth::user()->id.'/';
		for ($i=1; $i <= 3 ; $i++) { 
			
			if (Input::file('picture'.$i))
			 {
				$file = Input::file('picture'.$i);		

				File::makeDirectory($destinationPath, $mode = 0777, true, true);
				$filename = 'pub_'.Auth::user()->id.'_'.Str::random(20).'_'.Auth::user()->id .'.'. $file->getClientOriginalExtension();

				$mimeType = $file->getMimeType();
				$extension = $file->getClientOriginalExtension();

				$width = Image::make( $file->getRealPath() )->width();
				$height	= Image::make( $file->getRealPath() )->height();
				if ($width <= 600 && $height <= 800) {
					
					Image::make( $file->getRealPath() )->save($destinationPath .$filename )->destroy();
				}
				else
				{
					Image::make( $file->getRealPath() )->resize(600,800)->save($destinationPath .$filename )->destroy();
				}
				// $upload_success = $file->move($destinationPath,$filename);

				$data['picture'.$i] = $filename;
								
			}
			else
			{
				unset($data['picture'.$i]);
			}
		}
	
		Publication::create($data);
		Session::flash('message','Publicacion creada correctamente');
		Session::flash('class','success');
		return Redirect::to('/userpublications');

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
		// $exchanges = Exchange::where('publication_id', '=',$id )->where('status','=','inprogress')->get();
		$propublics = Propublic::where('publication_id','=',$id)->get();
		// echo "<pre>";
		// dd($propublics[0]->proposal->user->names);
		// echo "</pre>";
		return View::make('publications.show', compact('publication','propublics'));
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
		
		$destinationPath = 'uploads/images/publications/user_'.Auth::user()->id.'/';
		File::makeDirectory($destinationPath, $mode = 0777, true, true);
		
		if (Input::file('picture1'))
		{
			$file = Input::file('picture1');		
			$filename = 'pub_'.Auth::user()->id.'_'.Str::random(20).'_'.Auth::user()->id .'.'. $file->getClientOriginalExtension();
			$mimeType = $file->getMimeType();
			$extension = $file->getClientOriginalExtension();
			
			$width = Image::make( $file->getRealPath() )->width();
			$height	= Image::make( $file->getRealPath() )->height();
			if ($width <= 600 && $height <= 800) {
				
				Image::make( $file->getRealPath() )->save($destinationPath .$filename )->destroy();
			}
			else
			{
				Image::make( $file->getRealPath() )->resize(600,800)->save($destinationPath .$filename )->destroy();
			}
			// $upload_success = $file->move($destinationPath,$filename);
			File::delete($destinationPath.$publication->picture1);
			$data['picture1'] = $filename;
		}
		else
		{
			unset($data['picture1']);
		}

		if (Input::file('picture2'))
		{
			$file = Input::file('picture2');		
			$filename = 'pub_'.Auth::user()->id.'_'.Str::random(20).'_'.Auth::user()->id .'.'. $file->getClientOriginalExtension();
			$mimeType = $file->getMimeType();
			$extension = $file->getClientOriginalExtension();

			$width = Image::make( $file->getRealPath() )->width();
			$height	= Image::make( $file->getRealPath() )->height();
			if ($width <= 600 && $height <= 800) {
				
				Image::make( $file->getRealPath() )->save($destinationPath .$filename )->destroy();
			}
			else
			{
				Image::make( $file->getRealPath() )->resize(600,800)->save($destinationPath .$filename )->destroy();
			}
			
			// $upload_success = $file->move($destinationPath,$filename);
			File::delete($destinationPath.$publication->picture2);
			$data['picture2'] = $filename;
		}
		else
		{
			unset($data['picture2']);
		}

		if (Input::file('picture3'))
		{
			$file = Input::file('picture3');		
			$filename = 'pub_'.Auth::user()->id.'_'.Str::random(20).'_'.Auth::user()->id .'.'. $file->getClientOriginalExtension();
			$mimeType = $file->getMimeType();
			$extension = $file->getClientOriginalExtension();
			
			$width = Image::make( $file->getRealPath() )->width();
			$height	= Image::make( $file->getRealPath() )->height();
			if ($width <= 600 && $height <= 800) {
				
				Image::make( $file->getRealPath() )->save($destinationPath .$filename )->destroy();
			}
			else
			{
				Image::make( $file->getRealPath() )->resize(600,800)->save($destinationPath .$filename )->destroy();
			}			
			// $upload_success = $file->move($destinationPath,$filename);
			File::delete($destinationPath.$publication->picture3);
			$data['picture3'] = $filename;
		}
		else
		{
			unset($data['picture3']);
		}
		

		$publication->update($data);

		return Redirect::to('/userpublications');




	}

	/**
	 * Remove the specified publication from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$publication =  Publication::find($id);
	
		// Publication::destroy($id);

		if( Authentications::Owner( $publication->user->id , Auth::user()->id ) )
		{
			$destinationPath = 'uploads/images/publications/user_'.$publication->user->id.'/';
			File::delete($destinationPath.$publication->picture1);
			File::delete($destinationPath.$publication->picture2);
			File::delete($destinationPath.$publication->picture3);
			Publication::destroy($id);
			Session::flash('message','Publicacion borrada');
			Session::flash('class','success');
		
		}
		else
		{
			Session::flash('message','No tienes permiso para eso');
			Session::flash('class','danger');
			
		}
		return Redirect::to('/userpublications');
		// return Redirect::to('/');
		
		
	}

}
