<?php

class Publication extends \Eloquent {

	protected $table = 'publications';
	protected $fillable =['description','changeoptions','picture1','picture2','picture3','status','stock','cover','user_id','category_id','municipality_id'];
	protected $guarded = ['id'];

	 public static $rules = [
	 	'description'  => 'required',
	 	'changeoptions' => 'required',
	 	'picture1'  => 'mimes:jpg,jpeg,png',
	 	'picture2'  => 'mimes:jpg,jpeg,png',
	 	'picture2'  => 'mimes:jpg,jpeg,png',
	 	'stock' => 'required',
	 	'cover' => 'required',
	 	'category_id' => 'required',
	 	'municipality_id' => 'required',
	 ];


	public function user()
	{
	 	return $this->belongsTo('User');
	}
	public function municipality()
	{
	 	return $this->belongsTo('Municipality');
	}
	public function category()
	{
	 	return $this->belongsTo('Category');
	}
	public function comments()
	{
	 	return $this->HasMany('Comment')->orderBy('id','DESC');
	}
	public function proposals()
	{
	 	return $this->HasMany('Proposal');
	}
	public function exchanges()
	{
	 	return $this->HasMany('Exchange');
	}
	public function propublics()
	{
	 	return $this->HasMany('Propublic');
	}


}