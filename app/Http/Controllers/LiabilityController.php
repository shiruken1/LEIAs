<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Liability;
use Illuminate\Http\Request;

class LiabilityController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$liabilities = Liability::orderBy('id', 'desc')->paginate(10);

		return view('liabilities.index', compact('liabilities'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('liabilities.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$liability = new Liability();

		$liability->capital_id = $request->input("capital_id");
        $liability->capital_id = $request->input("capital_id");
        $liability->name = $request->input("name");
        $liability->price = $request->input("price");
        $liability->value = $request->input("value");
        $liability->growth_rate = $request->input("growth_rate");
        $liability->pattern = $request->input("pattern");
        $liability->cycle_up = $request->input("cycle_up");
        $liability->cycle_down = $request->input("cycle_down");

		$liability->save();

		return redirect()->route('liabilities.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$liability = Liability::findOrFail($id);

		return view('liabilities.show', compact('liability'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$liability = Liability::findOrFail($id);

		return view('liabilities.edit', compact('liability'));
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
		$liability = Liability::findOrFail($id);

		$liability->capital_id = $request->input("capital_id");
        $liability->capital_id = $request->input("capital_id");
        $liability->name = $request->input("name");
        $liability->value = $request->input("value");
        $liability->price = $request->input("price");
        $liability->growth_rate = $request->input("growth_rate");
        $liability->pattern = $request->input("pattern");
        $liability->cycle_up = $request->input("cycle_up");
        $liability->cycle_down = $request->input("cycle_down");

		$liability->save();

		return redirect()->route('liabilities.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$liability = Liability::findOrFail($id);
		$liability->delete();

		return redirect()->route('liabilities.index')->with('message', 'Item deleted successfully.');
	}

}
