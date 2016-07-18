<?php

class Proposal extends \Eloquent {

	// Add your validation rules here
	protected $table = 'proposals';
	protected $fillable =['description','publication_autor_names','picture','user_id','publication_id'];
	protected $guarded = ['id'];

	 public static $rules = [
	 	'description'  => 'required',
	 	'picture'  => 'required|mimes:jpg,jpeg,png',
	 	'user_id' => 'required',
	 	'publication_id' => 'required',
	 ];


	 public static $rulesupdate = [
	 	'description'  => 'required',
	 	'picture'  => 'mimes:jpg,jpeg,png',
	 	'user_id' => 'required',
	 	'publication_id' => 'required',
	 ];


	public function user()
	{
	 	return $this->belongsTo('User');
	}
	public function publication()
	{
	 	return $this->belongsTo('Publication');
	}


}