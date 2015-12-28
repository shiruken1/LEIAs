<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    public $timestamps = true;
    
    protected $table = 'assets';
    
	protected $guarded = [
                            'id', 'capital_id'
                         ];

    /* nunya section */
    protected $hidden = [
                            'updated_at'
                        ];
    
    /* input requirements */
    public static $rules = [
                             'capital_id'  => 'required|integer',
                             'name'        => 'required|string',
                             'description' => 'required|string',
            				 'price' 	   => 'required|integer',
            				 'value' 	   => 'integer',
            				 'growth_rate' => 'required|integer',
            				 'pattern' 	   => 'required|in:linear,square,sine,random',
            				 'growth_max'  => 'integer',
            				 'growth_min'  => 'integer',
                            ];
    public $errors;

    public function capital()
    {
        return $this->belongsTo('App\Capital');
    }

}
