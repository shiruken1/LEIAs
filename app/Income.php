<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
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
                             'capital_id'  => 'required|integer|exists:capitals,id',
                             'name'        => 'required|string',
                             'description' => 'required|string',
            				 'amount' 	   => 'required|integer',
            				 'pattern' 	   => 'required|in:linear,square,sine,random',
            				 'growth_rate' => 'required|integer',
            				 'growth_max'  => 'integer',
            				 'growth_min'  => 'integer',
                            ];
    public $errors;

    public function capital()
    {
        return $this->belongsTo('App\Capital');
    }

    
}
