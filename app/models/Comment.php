<?php

class Comment extends \Eloquent {

	protected $table = 'comments';
	protected $fillable =['comment','user_id','publication_id'];
	protected $guarded = ['id'];

	 public static $rules = [
	 	'comment' => 'required|min:4',
	 	'user_id' => 'required',
	 	'publication_id' => 'required',

	 ];

	// Don't forget to fill this array
	
	public function user()
	{
	 	return $this->belongsTo('User')->orderBy('id', 'ASC');
	}
	public function publication()
	{
	 	return $this->belongsTo('Publication');
	}
}