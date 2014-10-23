<?php

class PizzaIngredient extends \Eloquent {
  public function ingredient()
  {
    return $this->belongsTo('Ingredient');
  }

  // Add your validation rules here
  public static $rules = [
    // 'title' => 'required'
  ];

  // Don't forget to fill this array
  protected $fillable = [];

}
