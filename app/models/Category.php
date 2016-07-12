<?php

class Category extends \Eloquent {

	// Add your validation rules here
	protected $table = 'categories';
	protected $fillable =['name'];
	protected $guarded = ['id'];

	 public static $rules = [
	 	'name' => 'required|min:3|max:100',

	 ];





	public function publications()
	{
	 	return $this->HasMany('Publication');
	}


}