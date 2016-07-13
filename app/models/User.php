<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	protected $fillable = ['credential','names','surnames','email','tlf','photo','municipality_id'];
	protected $guarded = ['id'];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */

	public static $rulesregistro = [
	 	'credential'  => 'required|numeric|unique:users,credential',
	 	'names' => 'required|min:9|max:100',
	 	'surnames' => 'required|min:9|max:100',
	 	'email'  => 'required|email|unique:users,email|min:6|max:40',
	 	'tlf'  => 'required|numeric|min:10',
	 	'municipality_id' => 'required',
	 	'password'  => 'required|same:cpassword|min:8|max:25',
	 	'cpassword'  => 'required|same:password|min:8|max:25',
	
	 ];
	 public static $ruleslogin = [
	 	'email'  => 'required',
	 	'password'  => 'required',
	 	'state_id' => 'required',
	 ];
	 public static $rulesupdate = [
	 	'credential'  => 'required|numeric',
	 	'names' => 'required|min:9|max:100',
	 	'surnames' => 'required|min:9|max:100',
	 	'email'  => 'required|email|min:6|max:40',
	 	'tlf'  => 'required|numeric|min:10',
	 	'municipality_id' => 'required',
	 	'photo'  => 'mimes:jpg,jpeg,png',

	 ];

	 public static $messageregister = [
	 	'email.required' => 'El campo <strong> Email </strong> es requerido',
	 	'email.email' => 'El formato del campo <strong>Correo electronico</strong> no es valido',
	 	'email.unique' => 'El <strong>Correo electronico</strong> ya ha sido registrado',
	 	'email.min' => 'El campo <strong>Correo electronico</strong> debe contener minimo :min carecteres',
	 	'email.max' => 'El campo <strong>Correo electronico</strong> debe contener maximo :max carecteres',
	 	'password.required' => 'EL campo <strong>Contrasena </strong> es requerido',
	 	'password.same' => 'El campo <strong>Contrasena </strong> y el campo <strong>Confirmar Contrasena </strong> deben ser iguales ', 
	 	'password.min' => 'El campo <strong>Contrasena </strong> debe contener minimo :min caracteres ', 
	 	'password.max' => 'El campo <strong>Contrasena </strong> debe contener un maximo de :max caracteres ', 
	 	'cpassword.required' => 'El campo <strong>Confirmar Contrasena </strong> es requerido',
	 	'cpassword.same' => 'El campo <strong>Confirmar Contrasena </strong> y el campo <strong>Contrasena </strong> deben ser iguales ', 
	 	'cpassword.min' => 'El campo <strong>Confirmar Contrasena </strong> debe contener minimo :min caracteres ', 
	 	'cpassword.max' => 'El campo <strong>Confirmar Contrasena </strong> debe contener un maximo de :max caracteres ',
	 	'credential.required' => 'El campo <strong> Cedula </strong> es requerido',
	 	'credential.unique' => 'La <strong>Cedula </strong> ya esta en uso',
	 	'credential.numeric' => 'El campo <strong>Cedula </strong> debe ser numerico',
	 	'names.required' => 'EL campo <strong>Nombres </strong> es requerido',
	 	'names.min' => 'El campo <strong>Nombres </strong> debe contener minimo :min caracteres ', 
	 	'names.max' => 'El campo <strong>Nombres </strong> debe contener un maximo de :max caracteres ',
	 	'surnames.required' => 'EL campo <strong>Apellidos </strong> es requerido',
	 	'surnames.min' => 'El campo <strong>Apellidos </strong> debe contener minimo :min caracteres ', 
	 	'surnames.max' => 'El campo <strong>Apellidos </strong> debe contener un maximo de :max caracteres ', 
	 	'tlf.min' => 'El campo <strong>Telefono </strong> debe contener minimo :min caracteres ', 
	 	'tlf.required' => 'El campo <strong> Tlf </strong> es requerido',
	 	'tlf.numeric' => 'El campo <strong>Tlf </strong> debe ser numerico',
	 	'municipality_id.required' => 'EL campo <strong>Municipio o Parroquia </strong> es requerido',
	 	'state_id.required' => 'EL campo <strong>Estado </strong> es requerido',
	 	'photo.mimes' => 'El campo <strong> Foto </strong> debe ser solo jpg o png',

	 ];
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}


	public function publications()
	{
	 	return $this->HasMany('Publication');
	}
	public function comments()
	{
	 	return $this->HasMany('Comment');
	}
	public function municipality()
	{
	 	return $this->belongsTo('Municipality');
	}


}
