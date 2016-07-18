<?php

class ExchangesController extends \BaseController {

	/**
	 * Display a listing of exchanges
	 *
	 * @return Response
	 */
	public function index()
	{
		$exchanges = Exchange::all();

		return View::make('exchanges.index', compact('exchanges'));
	}

	/**
	 * Show the form for creating a new exchange
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('exchanges.create');
	}

	/**
	 * Store a newly created exchange in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Exchange::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Exchange::create($data);

		return Redirect::route('exchanges.index');
	}

	public function newEx($id_proposal)
	{
		// dd(base_path());
		$proposal = Proposal::findOrFail($id_proposal);
		$image1 = 'uploads/images/publications/user_'.$proposal->publication->user->id.'/'.$proposal->publication->picture;
		$image2 = 'uploads/images/publications/user_'.$proposal->publication->user->id.'/proposals/'.$proposal->picture;
		$destinationPath = 'uploads/images/publications/user_'.$proposal->publication->user->id.'/exchanges/';
		
		$publication_img =Str::random(8).$proposal->publication->picture;
		$proposal_img = Str::random(8).$proposal->picture;
		$data = array(	'publication_picture' => $publication_img,
      					'publication_id' =>$proposal->publication->id,
						'publication_autor_names' => $proposal->publication->user->names,
      					'proposal_picture' => $proposal_img,
      					'proposal_id' => $proposal->id, 
      					'proposal_autor_names' => $proposal->user->names,
      					);
		// echo "<pre>";
		// dd($destinationPath);
		// echo "</pre>";

		$validator = Validator::make($data , Exchange::$rules);
		if ($validator->fails())
		{
			Session::flash('message','Error al aceptar');
			Session::flash('class','danger');
			return Redirect::back()->withErrors($validator)->withInput();
		}
		// File::makeDirectory($destinationPath, $mode = 0777, true, true);
		// $fileExtension1 = File::extension($image1);
		// $fileExtension2 = File::extension($image2);
		// $newName1 = $proposal->publication->picture;
		// $newName2 = $proposal->picture;

		$newPathWithName1 = $destinationPath.$publication_img;
		$newPathWithName2 = $destinationPath.$proposal_img ;

		// echo "<pre>";
		// dd($newPathWithName1);
		// echo "</pre>";
		File::copy($image1,$newPathWithName1);
		File::copy($image2,$newPathWithName2);
		
		Exchange::create($data);
		Session::flash('message','Propuesta aceptada');
		Session::flash('class','success');

		return Redirect::back();

		
	}

	/**
	 * Display the specified exchange.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$exchange = Exchange::findOrFail($id);
		echo "<pre>";
		dd($exchange->user->names);
		echo "</pre>";
		return View::make('exchanges.show', compact('exchange'));
	}

	/**
	 * Show the form for editing the specified exchange.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$exchange = Exchange::find($id);

		return View::make('exchanges.edit', compact('exchange'));
	}

	/**
	 * Update the specified exchange in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$exchange = Exchange::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Exchange::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$exchange->update($data);

		return Redirect::route('exchanges.index');
	}

	/**
	 * Remove the specified exchange from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Exchange::destroy($id);

		return Redirect::route('exchanges.index');
	}

}
