<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $timestamps = true;
    
    protected $table = 'incomes';
    
	protected $guarded = [
                            // 'capital_id'
                         ];

    /* nunya section */
    protected $hidden = [
                            'updated_at'
                        ];
    
    /* input requirements */
    public static $rules = [
                             'name'        => 'required|string',
                             'date'        => 'required|date|default:now',
            				 'amount' 	   => 'required|integer',
                             'capital_id'  => 'required|integer|exists:capitals,id',
                             'category_id' => 'required|integer|exists:categories,id',
                            ];
    public $errors;

}
