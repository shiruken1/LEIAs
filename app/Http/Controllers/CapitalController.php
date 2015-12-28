<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Capital;
use Illuminate\Http\Request;

class CapitalController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$capitals = Capital::orderBy('id', 'desc')->paginate(10);

		return view('capitals.index', compact('capitals'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('capitals.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$capital = new Capital();

		$capital->name = $request->input("name");
        $capital->start_at = $request->input("start_at");
        $capital->end_at = $request->input("end_at");
        $capital->date_start = $request->input("date_start");
        $capital->date_end = $request->input("date_end");
        $capital->income_start = $request->input("income_start");
        $capital->income_end = $request->input("income_end");
        $capital->expenses_start = $request->input("expenses_start");
        $capital->expenses_end = $request->input("expenses_end");

		$capital->save();

		return redirect()->route('capitals.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$capital = Capital::findOrFail($id);

		return view('capitals.show', compact('capital'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$capital = Capital::findOrFail($id);

		return view('capitals.edit', compact('capital'));
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
		$capital = Capital::findOrFail($id);

		$capital->name = $request->input("name");
        $capital->start_at = $request->input("start_at");
        $capital->end_at = $request->input("end_at");
        $capital->date_start = $request->input("date_start");
        $capital->date_end = $request->input("date_end");
        $capital->income_start = $request->input("income_start");
        $capital->income_end = $request->input("income_end");
        $capital->expenses_start = $request->input("expenses_start");
        $capital->expenses_end = $request->input("expenses_end");

		$capital->save();

		return redirect()->route('capitals.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$capital = Capital::findOrFail($id);
		$capital->delete();

		return redirect()->route('capitals.index')->with('message', 'Item deleted successfully.');
	}

}
