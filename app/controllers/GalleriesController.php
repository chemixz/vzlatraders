<?php

class GalleriesController extends \BaseController {

	/**
	 * Display a listing of galleries
	 *
	 * @return Response
	 */
	public function index()
	{
		$galleries = Gallery::all();

		return View::make('galleries.index', compact('galleries'));
	}

	/**
	 * Show the form for creating a new gallery
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('galleries.create');
	}

	/**
	 * Store a newly created gallery in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// dd(Input::all());
		$validator = Validator::make($data = Input::all(), Gallery::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$file = Input::file('picture');		

		$destinationPath = 'uploads/images/galleries/';
		$filename = 'G_'.Str::random(13).'.'. $file->getClientOriginalExtension();
		$mimeType = $file->getMimeType();
		$extension = $file->getClientOriginalExtension();
		File::makeDirectory($destinationPath, $mode = 0777, true, true);
		$upload_success = $file->move($destinationPath,$filename);
		$data['picture'] = $filename;
		Gallery::create($data);

		// return Redirect::route('galleries.index');
		return Redirect::to('/galleries');
	}

	/**
	 * Display the specified gallery.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$gallery = Gallery::findOrFail($id);

		return View::make('galleries.show', compact('gallery'));
	}

	/**
	 * Show the form for editing the specified gallery.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$gallery = Gallery::find($id);

		return View::make('galleries.edit', compact('gallery'));
	}

	/**
	 * Update the specified gallery in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$gallery = Gallery::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Gallery::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$gallery->update($data);

		return Redirect::to('/galleries');
	}

	/**
	 * Remove the specified gallery from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Gallery::destroy($id);

		return Redirect::route('galleries.index');
	}

}
