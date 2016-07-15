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
		$validator = Validator::make($data , Proposal::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		if (Input::file('picture'))
		 {
			$file = Input::file('picture');		

			$destinationPath = 'uploads/images/publications/'.$publication_id.'/proposals/';
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

		return View::make('proposals.edit', compact('proposal'));
	}

	/**
	 * Update the specified proposal in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$proposal = Proposal::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Proposal::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$proposal->update($data);

		return Redirect::route('proposals.index');
	}

	/**
	 * Remove the specified proposal from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Proposal::destroy($id);

		return Redirect::route('proposals.index');
	}

}
