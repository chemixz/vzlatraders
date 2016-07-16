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

	/**
	 * Display the specified exchange.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$exchange = Exchange::findOrFail($id);

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
