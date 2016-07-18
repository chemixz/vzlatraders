<?php

class MunicipalitiesController extends \BaseController {

	/**
	 * Display a listing of municipalities
	 *
	 * @return Response
	 */
	public function index()
	{
		$municipalities = Municipality::all();

		return View::make('municipalities.index', compact('municipalities'));
	}

	/**
	 * Show the form for creating a new municipality
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('municipalities.create');
	}

	/**
	 * Store a newly created municipality in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Municipality::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Municipality::create($data);

		return Redirect::route('municipalities.index');
	}

	/**
	 * Display the specified municipality.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$municipality = Municipality::findOrFail($id);

		return View::make('municipalities.show', compact('municipality'));
	}

	/**
	 * Show the form for editing the specified municipality.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$municipality = Municipality::find($id);

		return View::make('municipalities.edit', compact('municipality'));
	}

	/**
	 * Update the specified municipality in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$municipality = Municipality::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Municipality::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$municipality->update($data);

		return Redirect::route('municipalities.index');
	}

	/**
	 * Remove the specified municipality from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Municipality::destroy($id);

		return Redirect::route('municipalities.index');
	}

}
