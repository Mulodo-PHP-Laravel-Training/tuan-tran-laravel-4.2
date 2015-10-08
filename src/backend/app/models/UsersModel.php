<?php
namespace App\Models;
class UsersModel extends \Eloquent{
	protected $table = 'Users';
	protected $fillable = array('username','password');

	public static function create(array $data){
		UsersModel::insert($data);
	}

	public static function get_by_username($username){
		return UsersModel::where('username',$username)->first();
	} 

	public static function get_by_email($email){
		return UsersModel::where('email',$email)->first();
	} 

	public static function login($log){
		return UsersModel::where('username',$log['username'])->first();
	}
}