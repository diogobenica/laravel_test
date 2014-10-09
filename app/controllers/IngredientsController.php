<?php

class IngredientsController extends \BaseController {

	/**
	 * Display a listing of ingredients
	 *
	 * @return Response
	 */
	public function index()
	{
		$ingredients = Ingredient::all();

		return View::make('ingredients.index', compact('ingredients'));
	}

	/**
	 * Show the form for creating a new ingredient
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('ingredients.create');
	}

	/**
	 * Store a newly created ingredient in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name'       => 'required',
			'price'      => 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('ingredients/create')
				->withErrors($validator);
		} else {
			$nerd = new Ingredient;
			$nerd->name       = Input::get('name');
			$nerd->price      = Input::get('price');
			$nerd->save();

			Session::flash('message', 'Ingrediente salvo com sucesso!');
			return Redirect::to('ingredients');
		}
	}

	/**
	 * Display the specified ingredient.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$ingredient = Ingredient::findOrFail($id);

		return View::make('ingredients.show', compact('ingredient'));
	}

	/**
	 * Show the form for editing the specified ingredient.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ingredient = Ingredient::find($id);

		return View::make('ingredients.edit', compact('ingredient'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'name'       => 'required',
			'price' 		 => 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('ingredients/' . $id . '/edit')
				->withErrors($validator);
		} else {
			$ingredient = Ingredient::find($id);
			$ingredient->name       = Input::get('name');
			$ingredient->price      = Input::get('price');
			$ingredient->save();

			// redirect
			Session::flash('message', 'Atualizado com sucesso!');
			return Redirect::to('ingredients');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Ingredient::destroy($id);

		return Redirect::route('ingredients.index');
	}

}
