<?php

class Category extends \Eloquent {

	// Add your validation rules here
	protected $table = 'categories';
	protected $fillable =['name','codecolor'];
	protected $guarded = ['id'];

	 public static $rules = [
	 	'name' => 'required|min:3|max:100',
	 	'codecolor' => 'required',


	 ];





	public function publications()
	{
	 	return $this->HasMany('Publication');
	}


}