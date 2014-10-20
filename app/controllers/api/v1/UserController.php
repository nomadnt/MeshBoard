<?php

namespace controllers\api\v1;

//use Illuminate\Support\Facades\Response;
//use Illuminate\Routing\Controllers\Controller;

use BaseController;
use Validator;
use Auth;
use User;
use Input;
use Hash;

class UserController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){
		return User::all()->toJson();
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(){
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(){
		
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id){
		$user = User::findOrFail($id);
		if($user->id == Auth::user()->id OR Auth::user()->hasRole('admin')){
			return $user;
		}else{
			App::abort(404);
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id){
		echo $id;
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id){
		$user = User::findOrFail($id);
		$data = Input::only('email', 'password', 'password_confirmation', 'language', 'route');

		if($user->id == Auth::user()->id OR Auth::user()->hasRole('admin')){
			$validator = Validator::make($data, array(
            	'email' => 'required', 
            	'password' => 'confirmed',
            	'password_confirmation' => 'required_with:password'
            ));

            if($validator->passes()){
				if(!empty($data['password'])) $user->password = Hash::make($data['password']);
				$user->email = $data['email'];
				$user->language = $data['language'];
				$user->route = $data['route'];
				$user->save();
				return $user;
			}
			return $validator->messages();

		}else{
			App::abort(404);
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id){
		//
	}


}
