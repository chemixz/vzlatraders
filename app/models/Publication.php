<?php

class Publication extends \Eloquent {

	protected $table = 'publications';
	protected $fillable =['description','changeoptions','picture','status','user_id','category_id','municipality_id'];
	protected $guarded = ['id'];

	 public static $rules = [
	 	'description'  => 'required',
	 	'changeoptions' => 'required',
	 	'picture'  => 'mimes:jpg,jpeg,png',
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
	public function exchange()
	{
	 	return $this->HasOne('Exchange');
	}


}