<?php

use Illuminate\Support\MessageBag;

class UserController extends BaseController {

	protected $layout = 'layouts.default';

	public function getLogin(){
		if(Auth::check()) return Redirect::to('/');
		$this->layout->content = View::make('user.login');
	}

	public function getLogout(){
		Auth::logout();
		return Redirect::to('user/login');
	}

	public function getRemind(){
		$this->layout->content = View::make('user.remind');
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null){
		if (is_null($token)) App::abort(404);

		$this->layout->content = View::make('user.reset')->with('token', $token);
	}

	/**
	 * Display the user profile
	 *
	 * @return Response
	 */
	public function getProfile(){
		$this->layout->content = View::make('user.profile')->with('user', Auth::user());
	}

	public function postLogin(){
		$data = array();
		if(Input::server('REQUEST_METHOD') == 'POST'){
            $validator = Validator::make(Input::all(), array(
            	'email' => 'required', 'password' => 'required'
            ));

            if($validator->passes()){
				$credentials = array(
					'email' => Input::get('email'),
					'password' => Input::get('password')
                );
                
                $remember = (Input::get('remember') == 1) ? TRUE : FALSE;

                if(Auth::attempt($credentials, $remember)){
					return Redirect::intended(Auth::user()->route);
				}
            }
			
			$data['errors'] = new MessageBag(array(
				'password' => array('Username and/or password invalid.')
			));
			$this->layout->content = View::make('user.login', $data);
        }
	}

	public function postRemind(){
		switch($response = Password::remind(Input::only('email'))){
			case Password::INVALID_USER:
				return Redirect::back()->with('error', Lang::get($response));
			case Password::REMINDER_SENT:
				return Redirect::back()->with('status', Lang::get($response));
		}
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset(){
		$credentials = Input::only('email', 'password', 'password_confirmation', 'token');

		$response = Password::reset($credentials, function($user, $password){
			$user->password = Hash::make($password);
			$user->save();
		});

		switch ($response){
			case Password::INVALID_PASSWORD:
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
				return Redirect::back()->with('error', Lang::get($response));
			case Password::PASSWORD_RESET:
				unset($credentials['token']);
				unset($credentials['password_confirmation']);
				if(Auth::attempt($credentials)){
					return Redirect::intended('user/profile');
				}
		}
	}

	public function postProfile(){
		dd(Input::get());
		return;
	}
}
