<?php

class Exchange extends \Eloquent {

	protected $table = 'exchanges';
	protected $fillable =['proposal_picture','user_id','publication_id'];
	protected $guarded = ['id'];

	 public static $rules = [

	 	'proposal_picture' => 'required',
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