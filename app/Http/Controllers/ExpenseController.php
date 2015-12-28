<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$expenses = Expense::orderBy('id', 'desc')->paginate(10);

		return view('expenses.index', compact('expenses'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('expenses.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$expense = new Expense();

		$expense->capital_id = $request->input("capital_id");
        $expense->capital_id = $request->input("capital_id");
        $expense->name = $request->input("name");
        $expense->amount = $request->input("amount");
        $expense->growth_rate = $request->input("growth_rate");
        $expense->pattern = $request->input("pattern");
        $expense->cycle_up = $request->input("cycle_up");
        $expense->cycle_down = $request->input("cycle_down");

		$expense->save();

		return redirect()->route('expenses.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$expense = Expense::findOrFail($id);

		return view('expenses.show', compact('expense'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$expense = Expense::findOrFail($id);

		return view('expenses.edit', compact('expense'));
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
		$expense = Expense::findOrFail($id);

		$expense->capital_id = $request->input("capital_id");
        $expense->capital_id = $request->input("capital_id");
        $expense->name = $request->input("name");
        $expense->amount = $request->input("amount");
        $expense->growth_rate = $request->input("growth_rate");
        $expense->pattern = $request->input("pattern");
        $expense->cycle_up = $request->input("cycle_up");
        $expense->cycle_down = $request->input("cycle_down");

		$expense->save();

		return redirect()->route('expenses.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$expense = Expense::findOrFail($id);
		$expense->delete();

		return redirect()->route('expenses.index')->with('message', 'Item deleted successfully.');
	}

}
