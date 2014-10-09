<?php

class Pizza extends \Eloquent {
  public function ingredients()
  {
    return $this->hasMany('PizzaIngredient');
  }

	public static $rules = [
		'name' => 'required'
	];

	protected $fillable = [];
}
