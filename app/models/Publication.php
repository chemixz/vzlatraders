<?php

class Publication extends \Eloquent {

	protected $table = 'publications';
	protected $fillable =['product_name','product_brand','description','value','picture','status','user_id','category_id','municipality_id'];
	protected $guarded = ['id'];

	 public static $rules = [
	 	'product_name' => 'required|min:5|max:100',
	 	'product_brand'  => 'required|min:5|max:100',
	 	'description'  => 'required',
	 	'value' => 'required|numeric',
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
	 	return $this->HasMany('Comment');
	}


}