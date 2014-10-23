<?php

class SalesController extends \BaseController {

	/**
	 * Procura as compras somente do usuário logado
	 */
	public function index()
	{
		$sales = Sale::where('user_id', '=', Session::get('authenticated'))->get();

		return View::make('sales.index', compact('sales'));
	}

	/**
	 * Show the form for creating a new sale
	 *
	 * @return Response
	 */
	public function create()
	{
		$pizzas = Pizza::find(array('user_id', '=', Session::get('authenticated')));
		$pizzas_array = array('' => '');

		foreach($pizzas as $pizza)
		{
			$pizzas_array[$pizza->id] = $pizza->name;
		}
		return View::make('sales.create', compact('pizzas_array'));
	}

	/**
	 * Salva uma compra
	 */
	public function store()
	{
		$sale = new Sale;
		$sale->user_id = Session::get('authenticated');
		$sale->save();

		foreach(Input::get('pizza_id') as $pizza_id)
		{
			if ($pizza_id)
			{
				$sale_item = new SaleItem;
				$sale_item->sale_id = $sale->id;
				$sale_item->pizza_id = $pizza_id;
				$sale_item->save();
			}
		}

		Session::flash('message', 'Compra cadastrada com sucesso!');
		return Redirect::to('sales');
	}

	/**
	 * Display the specified sale.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$sale = Sale::findOrFail($id);

		return View::make('sales.show', compact('sale'));
	}

	/**
	 * Show the form for editing the specified sale.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$sale = Sale::find($id);

		return View::make('sales.edit', compact('sale'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$sale = Sale::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Sale::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$sale->update($data);

		return Redirect::route('sales.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Sale::destroy($id);

		return Redirect::route('sales.index');
	}

}
