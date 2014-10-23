<?php

class SessionsController extends Controller {
	/**
	 * Método responsável por verificar se o usuário já está logado
	 */
	public function create()
	{
		if(Session::get('authenticated')){
  		return Redirect::to('pizzas');
  	}
		return View::make('sessions.create');
	}

	/**
	 * Criação da sessão do usuário
	 */
	public function store()
	{
		$email = Input::get('email');
		$password = Input::get('password');

		$user = User::where('email', '=', $email)->first();

		if (!$user)
		{
			return Redirect::back()->withInput();
		}

		if (!Hash::check($password, $user->password))
		{
			return Redirect::back()->withInput();
		}

		Session::put('authenticated', $user->id);

		return Redirect::to('pizzas');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Session::forget('authenticated');

		return Redirect::to('/');
	}

}
