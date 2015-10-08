<?php
use App\Models\UsersModel;
class UsersController extends BaseController {

	function __construct(UsersModel $users)
	{
		$this->user=$users;
	}		

	/*public function createuser($username,$password,$email){
		$check_user=$this->user->get_by_username($username);
		if(is_null($check_user)){
			$data=array(       
		        'password' => Hash::make($password),
		        'username' => $username,
		        'email' => $email
			);
			$this->user->create($data);
			return 'SUCCESS!';
		}else{
			return 'Your username already exists';
		}
	}*/

	public function createuser(){

		$username=Request::get('username');
		$password=Request::get('password');
		$email=Request::get('email');

		$check_user=$this->user->get_by_username($username);
		$check_email=$this->user->get_by_email($email);
		if(is_null($check_user) && is_null($check_email)){
			$data=array(       
		        'password' => Hash::make($password),
		        'username' => $username,
		        'email' => $email
			);
			$this->user->create($data);
			return 'SUCCESS!';
		}else{
			return 'Your username/email already exists';
		}
	}

	public function login(){
		$username=Input::get('username');
		$password=Input::get('password');
		if (Auth::attempt(array('username' => $username, 'password' => $password)))
		{
		    return 'Welcome to my Demo';
		}else{
			return Input::all();
		}
	}

	public function logout(){
		Auth::logout();
		return Redirect::to('.');
	}
}