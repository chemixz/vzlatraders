<?php

class Publication extends \Eloquent {

	protected $table = 'publications';
	protected $fillable =['product_name','product_brand','description','value','picture','status','user_id','category_id','state_id'];
	protected $guarded = ['id'];

	 public static $rules = [
	 	'product_name' => 'required|min:5|max:100',
	 	'product_brand'  => 'required|min:5|max:100',
	 	'description'  => 'required',
	 	'value' => 'required|numeric',
	 	'picture'  => 'mimes:jpg,jpeg,png',
	 	'category_id' => 'required',
	 	'state_id' => 'required',
	 ];


	public function user()
	{
	 	return $this->belongsTo('User');
	}
	public function state()
	{
	 	return $this->belongsTo('State');
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