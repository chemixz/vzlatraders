<?php

class ProposalsController extends \BaseController {

	/**
	 * Display a listing of proposals
	 *
	 * @return Response
	 */
	public function index()
	{
		$proposals = Proposal::all();

		return View::make('proposals.index', compact('proposals'));
	}

	/**
	 * Show the form for creating a new proposal
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('proposals.create');
	}

	/**
	 * Store a newly created proposal in storage.
	 *
	 * @return Response
	 */
	public function store($publication_id)
	{
		$data = Input::all();
		$data['user_id']= Auth::user()->id;
		$data['publication_id'] = $publication_id;
		$publication = Publication::find($publication_id);
		$validator = Validator::make($data , Proposal::$rules);


		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		if (Input::file('picture'))
		 {
			$file = Input::file('picture');		

			$destinationPath = 'uploads/images/publications/user_'.$publication->user->id.'/proposals/';
			// File::makeDirectory($destinationPath, $mode = 0777, true, true);
			$filename = 'p_'.$publication_id.'_u_'.Auth::user()->id.'_'.Str::random(20).'.'. $file->getClientOriginalExtension();
			$mimeType = $file->getMimeType();
			$extension = $file->getClientOriginalExtension();
			$upload_success = $file->move($destinationPath,$filename);

			$data['picture'] = $filename;
							
		}
		else
		{
			unset($data['picture']);
		}

		Proposal::create($data);

		 return Redirect::back();
	}

	/**
	 * Display the specified proposal.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$proposal = Proposal::findOrFail($id);

		return View::make('proposals.show', compact('proposal'));
	}

	/**
	 * Show the form for editing the specified proposal.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$proposal = Proposal::find($id);
		// $proposal['publication'] = $proposal->publication;
		// return View::make('proposals.edit', compact('proposal'));
		return Response::json($proposal);
	}
	// public function ajax($id)
	// {
	// 	$states = State::find($id);
	// 	// echo "<pre>";
	// 	// dd($states->municipalities);
	// 	// echo "</pre>";
	// 	return Response::json($states->municipalities);
	// }


	/**
	 * Update the specified proposal in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$proposal = Proposal::findOrFail($id);
		if ($proposal->user->id == Auth::user()->id )
		{
			
			$data = Input::all();
			$data['user_id']= $proposal->user->id;
			$data['publication_id'] = $proposal->publication->id;
			$validator = Validator::make($data , Proposal::$rulesupdate);
			
			if ($validator->fails())
			{
				return Redirect::back()->withErrors($validator)->withInput();
			}
			if (Input::file('picture'))
			 {
				$file = Input::file('picture');	
				$destinationPath = 'uploads/images/publications/user_'.$proposal->publication->user->id.'/proposals/';
				// File::makeDirectory($destinationPath, $mode = 0777, true, true);
				$filename = 'p_'.$proposal->publication->id.'_u_'.Auth::user()->id.'_'.Str::random(20).'.'. $file->getClientOriginalExtension();
				$mimeType = $file->getMimeType();
				$extension = $file->getClientOriginalExtension();
				$upload_success = $file->move($destinationPath,$filename);
				File::delete($destinationPath.$proposal->picture);
				$data['picture'] = $filename;
								
			}
			else
			{
				unset($data['picture']);
			}
			Session::flash('message','Propuesta actualizada');
			Session::flash('class','success');
			$proposal->update($data);
			
		}
		else
		{
			Session::flash('message','No tienes permiso de hacer eso');
			Session::flash('class','danger');

		}

		 return Redirect::back();

	}

	/**
	 * Remove the specified proposal from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$proposal = Proposal::find($id);

		if ($proposal->user->id == Auth::user()->id || $proposal->publication->user->id == Auth::user()->id ) {
				
			$destinationPath = 'uploads/images/publications/user_'.$proposal->publication->user->id.'/proposals/';
			File::delete($destinationPath.$proposal->picture);
			Proposal::destroy($id);
			Session::flash('message','Propuesta borrada');
			Session::flash('class','success');
				
			
		}
		else
		{
			Session::flash('message','No tienes permiso para eso');
			Session::flash('class','warning');
		}
		return Redirect::back();

	}

}
