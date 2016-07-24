<?php

class Gallery extends \Eloquent {

	// Add your validation rules here
	protected $table = 'galleries';
	protected $fillable =['picture'];
	protected $guarded = ['id'];

	public static $rules = [
		'picture'  => 'mimes:jpg,jpeg,png',
	 	'picture'  => 'required|unique:galleries,picture',
	 	// 'picture'  => 'image|image_size:<=300'

	];

}