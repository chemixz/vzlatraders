<?php

class State extends \Eloquent {



	protected $table = 'states';
	protected $fillable =['name'];
	protected $guarded = ['id'];

	// Add your validation rules here
	public static $rules = [
		'name' => 'required|min:3|max:100',
	];


	public function publications()
	{
	 	return $this->HasMany('Publication');
	}
	public function users()
	{
	 	return $this->HasMany('User');
	}

}