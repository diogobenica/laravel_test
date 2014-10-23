<?php

class Sale extends \Eloquent {
  public function pizzas()
  {
    return $this->hasMany('SaleItem');
  }
	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

}
