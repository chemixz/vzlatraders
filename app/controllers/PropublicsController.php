<?php

class PropublicsController extends \BaseController {

	/**
	 * Display a listing of propublics
	 *
	 * @return Response
	 */
	public function index()
	{
		$propublics = Propublic::all();

		return View::make('propublics.index', compact('propublics'));
	}

	/**
	 * Show the form for creating a new propublic
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('propublics.create');
	}

	/**
	 * Store a newly created propublic in storage.
	 *
	 * @return Response
	 */
	public function newPropublic($id_proposal)
	{
		$proposal = Proposal::findOrFail($id_proposal);
		$data = [
			'publication_id' => $proposal->publication->id,
			'proposal_id' => $proposal->id,
		];

		$validator = Validator::make($data , Propublic::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$user = User::find($proposal->user->id );
		$datamail = [
			'msj' => 'Vzlatraders le informa que una de tus propuestas ha sido aceptada',
			'names' => $proposal->user->names,
			'publication' => $proposal->publication->description,
			'proposal' => $proposal->description,
			'publication_email' => $proposal->publication->user->email,
		 ];


		Mail::send('emails.accept', $datamail, function($message) use ($user)
		{
	  	   	$message->from('vzlatrader@gmail.com');
	   		$message->to($user->email, $user->names)->subject('Vzlatrader Propuesta aceptada');

		});

		Propublic::create($data);
		Session::flash('message','Propuesta aceptada');
		Session::flash('class','success');
		return Redirect::back();
	}
	public function complete($propublic_id, $who)
	{
		$propublic = Propublic::find($propublic_id);

			
		if ($propublic->publication->user->id == Auth::user()->id)
		{
			
			$propublic->publisher_complete = 1;
			$propublic->save();
			$flag = $this->checkcompelte($propublic_id);

		}
		elseif ($propublic->proposal->user->id ==  Auth::user()->id)
		{
			$propublic->proposal_complete = 1;
			$propublic->save();
			$flag = $this->checkcompelte($propublic_id);
		
		}
		else
		{
			Session::flash('message','Sigue asi y te banneo por direccion mac');
			Session::flash('class','danger');
			return Redirect::back();
		}

		return Redirect::back();
		

	}
	public function checkcompelte($propublic_id)
	{
		$flag = false;
		$cont = 0;
		$propublic = Propublic::find($propublic_id);
		if ( ($propublic->publisher_complete + $propublic->proposal_complete) == 2 ) {
			$flag = true;
		}

		if ($flag) {

			$data = array(
					array(
						'proposal_picture' => $propublic->proposal->picture,
						'publication_id' =>$propublic->publication->id,
						'user_id' => $propublic->publication->user->id,
						),
					array(
						'proposal_picture' => $propublic->proposal->picture,
						'publication_id' =>$propublic->publication->id,
						'user_id' => $propublic->proposal->user->id
						),
					);
			foreach ($data as $dat) 
			{
				$validator = Validator::make( $dat , Exchange::$rules);
				if ($validator->fails())
				{
					return Redirect::back()->withErrors($validator)->withInput();
					$cont = $cont + 1;
				}

			}
			if ($cont == 2) 
			{	
				// $propublic->publisher_complete = 0;
				// $propublic->proposal_complete = 0;
				// $propublic->save();
				Session::flash('message','Error en intercambio');
				Session::flash('class','danger');
				return Redirect::back()->withErrors($validator)->withInput();
				
			}
			else
			{	
				Exchange::create($data[0]);
				Exchange::create($data[1]);

				$image = 'uploads/images/publications/user_'.$propublic->publication->user->id.'/proposals/'.$propublic->proposal->picture;
				$destinationPathExchange = 'uploads/images/publications/user_'.$propublic->publication->user->id.'/exchanges/';
				File::makeDirectory($destinationPathExchange, $mode = 0777, true, true);
				$newPathWithName = $destinationPathExchange.$propublic->proposal->picture ;
				File::copy($image,$newPathWithName);

				$PathProposal = 'uploads/images/publications/user_'.$propublic->publication->user->id.'/proposals/';
				File::delete($PathProposal.$propublic->proposal->picture);
				Proposal::destroy($propublic->proposal->id);

				Session::flash('message','Intercambio finalizado solo faltabas tu');
				Session::flash('class','success');

				$publication = Publication::find($propublic->publication->id);
				if ($publication->stock > 0) {
					$publication->stock = $publication->stock - 1;
					$publication->save();
				}
				return Redirect::back();
			}


		}
		
		return Redirect::back();
	}

	/**
	 * Display the specified propublic.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$propublic = Propublic::findOrFail($id);

		return View::make('propublics.show', compact('propublic'));
	}

	/**
	 * Show the form for editing the specified propublic.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$propublic = Propublic::find($id);

		return View::make('propublics.edit', compact('propublic'));
	}

	/**
	 * Update the specified propublic in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$propublic = Propublic::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Propublic::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$propublic->update($data);

		return Redirect::route('propublics.index');
	}

	/**
	 * Remove the specified propublic from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Propublic::destroy($id);

		return Redirect::route('propublics.index');
	}

}
