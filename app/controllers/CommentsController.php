<?php

class CommentsController extends \BaseController {

	/**
	 * Display a listing of comments
	 *
	 * @return Response
	 */
	public function index()
	{
		$comments = Comment::all();

		return View::make('comments.index', compact('comments'));
	}

	/**
	 * Show the form for creating a new comment
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('comments.create');
	}

	/**
	 * Store a newly created comment in storage.
	 *
	 * @return Response
	 */
	public function store($publication_id)
	{
		$data = Input::all();

		$data['user_id']= Auth::user()->id;
		$data['publication_id'] = $publication_id;
		$validator = Validator::make($data , Comment::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		Session::flash('message','Comentario Creado');
		Session::flash('class','success');
		Comment::create($data);
		return Redirect::back();
		// return Redirect::route('comments.index');
	}

	/**
	 * Display the specified comment.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$comment = Comment::findOrFail($id);

		return View::make('comments.show', compact('comment'));
	}

	/**
	 * Show the form for editing the specified comment.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$comment = Comment::find($id);
		return Response::json($comment);
		
		// return View::make('comments.edit', compact('comment'));
	}

	/**
	 * Update the specified comment in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$comment = Comment::findOrFail($id);
		$data = Input::all();
		$data['user_id']= $comment->user->id;
		$data['publication_id'] = $comment->publication->id;
		$validator = Validator::make($data, Comment::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		Session::flash('message','Comentario Actualizado');
		Session::flash('class','success');
		$comment->update($data);
		return Redirect::back();
	}

	/**
	 * Remove the specified comment from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$comment = Comment::find($id);
		
		if ($comment->user->id == Auth::user()->id  || Auth::user()->level == 2 ) {
			Comment::destroy($id);
			Session::flash('message','Comentario borrado');
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
