<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$incomes = Income::orderBy('id', 'desc')->paginate(10);

		return view('incomes.index', compact('incomes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('incomes.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$income = new Income();

		$income->capital_id = $request->input("capital_id");
        $income->capital_id = $request->input("capital_id");
        $income->name = $request->input("name");
        $income->amount = $request->input("amount");
        $income->growth_rate = $request->input("growth_rate");
        $income->pattern = $request->input("pattern");
        $income->cycle_up = $request->input("cycle_up");
        $income->cycle_down = $request->input("cycle_down");

		$income->save();

		return redirect()->route('incomes.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$income = Income::findOrFail($id);

		return view('incomes.show', compact('income'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$income = Income::findOrFail($id);

		return view('incomes.edit', compact('income'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$income = Income::findOrFail($id);

		$income->capital_id = $request->input("capital_id");
        $income->capital_id = $request->input("capital_id");
        $income->name = $request->input("name");
        $income->amount = $request->input("amount");
        $income->growth_rate = $request->input("growth_rate");
        $income->pattern = $request->input("pattern");
        $income->cycle_up = $request->input("cycle_up");
        $income->cycle_down = $request->input("cycle_down");

		$income->save();

		return redirect()->route('incomes.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$income = Income::findOrFail($id);
		$income->delete();

		return redirect()->route('incomes.index')->with('message', 'Item deleted successfully.');
	}

}
