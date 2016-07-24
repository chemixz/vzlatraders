<?php

class Propublic extends \Eloquent {

	protected $table = 'propublics';
	protected $fillable =['proposal_id','publication_id'];
	protected $guarded = ['id'];

	 public static $rules = [
	 	'proposal_id' => 'required',
	 	'publication_id' => 'required',
	 ];

	public function proposal()
	{
	 	return $this->belongsTo('Proposal');
	}
	public function publication()
	{
	 	return $this->belongsTo('Publication');
	}
}