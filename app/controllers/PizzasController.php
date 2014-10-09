<?php

class PizzasController extends \BaseController {

	/**
	 * Display a listing of pizzas
	 *
	 * @return Response
	 */
	public function index()
	{
		$pizzas = Pizza::where('user_id', '=', Session::get('authenticated'))->get();
		//var_dump($pizzas[0]->ingredients->get(5));

		return View::make('pizzas.index', compact('pizzas'));
	}

	/**
	 * Show the form for creating a new pizza
	 *
	 * @return Response
	 */
	public function create()
	{
		$ingredients = Ingredient::all();
		$ingredients_array = array('' => '');

		foreach($ingredients as $ingredient)
		{
			$ingredients_array[$ingredient->id] = $ingredient->name;
		}
		return View::make('pizzas.create', compact('ingredients_array'));
	}

	/**
	 * Salva uma pizza e seus ingredientes
	 */
	public function store()
	{
		$rules = array(
			'name'         => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('pizzas/create')
				->withErrors($validator);
		} else {
			$pizza = new Pizza;
			$pizza->name         = Input::get('name');
			$pizza->user_id      = Session::get('authenticated');
			$pizza->save();

			foreach(Input::get('ingredient_id') as $ingredient_id)
			{
				if ($ingredient_id)
				{
					$pizza_ingredient = new PizzaIngredient;
					$pizza_ingredient->pizza_id = $pizza->id;
					$pizza_ingredient->ingredient_id = $ingredient_id;
					$pizza_ingredient->save();
				}
			}

			Session::flash('message', 'Pizza cadastrada com sucesso!');
			return Redirect::to('pizzas');
		}
	}

	/**
	 * Display the specified pizza.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$pizza = Pizza::findOrFail($id);

		return View::make('pizzas.show', compact('pizza'));
	}

	/**
	 * Show the form for editing the specified pizza.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pizza = Pizza::find($id);
		$ingredients = Ingredient::all();
		$ingredients_array = array('' => '');

		foreach($ingredients as $ingredient)
		{
			$ingredients_array[$ingredient->id] = $ingredient->name;
		}

		return View::make('pizzas.edit', compact('pizza', 'ingredients_array'));
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
			'name'         => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('pizzas/'.$id.'/edit')
				->withErrors($validator);
		} else {
			$pizza = Pizza::find($id);
			$pizza->name         = Input::get('name');
			$pizza->user_id      = Session::get('authenticated');
			$pizza->save();

			foreach ($pizza->ingredients as $key => $pizza_ingredient) {
				PizzaIngredient::destroy($pizza_ingredient->id);
			}

			foreach(Input::get('ingredient_id') as $ingredient_id)
			{
				if ($ingredient_id)
				{
					$pizza_ingredient = new PizzaIngredient;
					$pizza_ingredient->pizza_id = $pizza->id;
					$pizza_ingredient->ingredient_id = $ingredient_id;
					$pizza_ingredient->save();
				}
			}

			Session::flash('message', 'Pizza alterada com sucesso!');
			return Redirect::to('pizzas');
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
		Pizza::destroy($id);

		return Redirect::route('pizzas.index');
	}

}
