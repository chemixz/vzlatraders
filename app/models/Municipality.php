<?php

class Municipality extends \Eloquent {

	// Add your validation rules here

	protected $table = 'municipalities';
	protected $fillable =['name','state_id'];
	protected $guarded = ['id'];

	// Add your validation rules here
	public static $rules = [
		'name' => 'required|min:4|max:100',
		'state_id' => 'required',
	];
	// Don't forget to fill this array
	public function state()
	{
	 	return $this->belongsTo('State');
	}
	public function publications()
	{
	 	return $this->HasMany('Publication');
	}

}