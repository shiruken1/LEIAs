<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Capital extends Model
{
    public $timestamps = true;
    protected $dates = ['date_start', 'date_end'];

    protected $table = 'capitals';

    protected $guarded = [
                            'id'
                         ];

    /* nunya section */
    protected $hidden = [
                            'updated_at'
                        ];

    /* input requirements */
    public static $rules = [
                             'name'              => 'required|string',
                             'description'       => 'required|string',
                             'start_at'	         => 'required|in:date,income,expenses',
                             'end_at'	         => 'required|in:date,income,expenses',
                             'date_start'        => 'date|default:now',
                             'date_end'          => 'date|default:now',
                             'income_start_id'   => 'integer',
                             'income_start'      => 'integer',
                             'income_end'        => 'integer',
                             'expenses_id'       => 'integer',
                             'expenses_start_id' => 'integer',
                             'expenses_end'      => 'integer',
                            ];
    public $errors;

    public function asset()
    {
        return $this->hasMany('App\Asset');
    }
    public function expense()
    {
        return $this->hasMany('App\Expense');
    }
    public function income()
    {
        return $this->hasMany('App\Income');
    }
    public function liability()
    {
        return $this->hasMany('App\Liability');
    }

    /**
     * Get who it's tied to in one shot
     *
     * @return array[0] the amount or Carbon date by which this capital is set to begin
     * @return array[1] the Income or Expense object
     **/
    public function startsWhen()
    {
        $starts = (string)$this->start_at.'_start';
        $object = FALSE;

        if($this->start_at === 'income')
            $object = Income::findOrFail($this->income_start_id);
        if($this->start_at === 'expenses')
            $object = Expense::findOrFail($this->expenses_start_id);

        return array($object, $this->{$starts});
    }

    /**
     * Get who it's tied to in one shot
     *
     * @return array[0] the amount or Carbon date by which this capital is set to begin
     * @return array[1] the Income or Expense object
     **/
    public function endsWhen()
    {
        $ends = (string)$this->end_at.'_end';
        $object = FALSE;

        if($this->end_at === 'income')
            $object = Income::findOrFail($this->income_end_id);
        if($this->end_at === 'expenses')
            $object = Expense::findOrFail($this->expenses_end_id);

        return array($object, $this->{$ends});
    }

    /**
     * Runs a day's simulation
     *
     * @return void
     **/
    public function simulateDays($days)
    {
        $count = $days;
        while($count) {
            foreach($this->expense as $expense) {

                    $rate = ($expense->growth_rate / 100) * $expense->amount;

                    switch($expense->pattern) {
                        case 'linear':
                            $expense->amount = $expense->amount + $rate; //the baseline is the end result
                         break;

                        case 'random':
                            $expense->amount = $expense->amount + $rate; // start off with the baseline

                            $max = ($expense->growth_max / 100) * $expense->amount;
                            $min = ($expense->growth_min / 100) * $expense->amount;

                            $expense->amount = $expense->amount + mt_rand(0 - $min, $max);
                         break;

                        case 'square':
                            if($days % $expense->growth_max !== $days) { // if the simulation will run for at least 1 cycle
                                if(($days - $count) % $expense->growth_min === 0) // and it's been long enough to run again within that cycle
                                    $expense->amount = $expense->amount + $rate;
                            }
                         break;

                        case 'sine':
                            if(($days - $count) !== 0) {
                                if($days % $expense->growth_max !== $days) { // if the simulation will run for at least 1 cycle

	                                $b = 2*pi() / $expense->growth_max; // get the linear speed from the period
	                                $curve = $expense->growth_min * sin($days - $count + $rate);

	                                $expense->amount = $expense->amount + $curve;
                            	}
                            } else
                                $expense->amount = $expense->amount + $rate; //first point!
                         break;
                    }

                $expenses[$expense->name][] = $expense;
            }

            $count--;
        }
    }

}
