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
		$cont = 0;
		$image1 = 'uploads/images/publications/user_'.$proposal->publication->user->id.'/'.$proposal->publication->picture;
		$image2 = 'uploads/images/publications/user_'.$proposal->publication->user->id.'/proposals/'.$proposal->picture;
		$destinationPath = 'uploads/images/publications/user_'.$proposal->publication->user->id.'/exchanges/';
		
		$publication_img =Str::random(8).$proposal->publication->picture;
		$proposal_img = Str::random(8).$proposal->picture;

		$data = array(
					array(
						'publication_picture' => $publication_img,
						'publication_autor_names' => $proposal->publication->user->names,
						'proposal_picture' => $proposal_img,
						'proposal_autor_names' => $proposal->user->names,
						'publication_id' =>$proposal->publication->id,
						'user_id' => $proposal->publication->user->id,
						),
					array(
						'publication_picture' => $publication_img,
						'publication_autor_names' => $proposal->publication->user->names,
						'proposal_picture' => $proposal_img,
						'proposal_autor_names' => $proposal->user->names,
						'publication_id' =>$proposal->publication->id,
						'user_id' => $proposal->user->id
						),
					);
		// echo "<pre>";
		// dd($data[0]);
		// echo "</pre>";

		for ($i= 0; $i < count($data) ; $i++) { 
			$validator = Validator::make( $data[$i] , Exchange::$rules);

			if ($validator->fails())
			{
				return Redirect::back()->withErrors($validator)->withInput();
				$cont = $cont + 1;
			}
		}
		if ($cont == 2) 
		{	
			
			Session::flash('message','Error al aceptar');
			Session::flash('class','danger');
			return Redirect::back()->withErrors($validator)->withInput();
			
		}
		else
		{
			File::makeDirectory($destinationPath, $mode = 0777, true, true);
			$newPathWithName1 = $destinationPath.$publication_img;
			$newPathWithName2 = $destinationPath.$proposal_img ;
			// echo "<pre>";
			// dd($newPathWithName1);
			// echo "</pre>";
			// File::copy($image1,$newPathWithName1);
			// File::copy($image2,$newPathWithName2);
			
			// Exchange::create($data[0]);
			// Exchange::create($data[1]);

			$user = User::find($proposal->user->id );
				$data = [
					'msj' => 'Vzlatraders le informa que una de tus propuestas han sido aceptada',
					'names' => $proposal->user->names,
					'publication' => $proposal->publication->description,
					'proposal' => $proposal->description,
					'publication_email' => $proposal->publication->user->email,
				 ];


				Mail::send('emails.accept', $data, function($message) use ($user)
				{
			  	   	$message->from('vzlatrader@vzla.com');
			   		$message->to($user->email, $user->names)->subject('Vzlatrader Propuesta aceptada');

				});


			Session::flash('message','Propuesta aceptada');
			Session::flash('class','success');


		}
		// 
		// $fileExtension1 = File::extension($image1);
		// $fileExtension2 = File::extension($image2);
		// $newName1 = $proposal->publication->picture;
		// $newName2 = $proposal->picture;

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
