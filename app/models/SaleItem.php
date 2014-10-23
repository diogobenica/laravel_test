<?php

class SaleItem extends \Eloquent {
  public function pizza()
  {
    return $this->belongsTo('Pizza');
  }

  // Add your validation rules here
  public static $rules = [
    // 'title' => 'required'
  ];

  // Don't forget to fill this array
  protected $fillable = [];

}
