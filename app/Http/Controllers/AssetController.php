<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$assets = Asset::orderBy('id', 'desc')->paginate(10);

		return view('assets.index', compact('assets'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('assets.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$asset = new Asset();

		$asset->capital_id = $request->input("capital_id");
        $asset->name = $request->input("name");
        $asset->price = $request->input("price");
        $asset->value = $request->input("value");
        $asset->growth_rate = $request->input("growth_rate");
        $asset->pattern = $request->input("pattern");
        $asset->cycle_up = $request->input("cycle_up");
        $asset->cycle_down = $request->input("cycle_down");

		$asset->save();

		return redirect()->route('assets.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$asset = Asset::findOrFail($id);

		return view('assets.show', compact('asset'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$asset = Asset::findOrFail($id);

		return view('assets.edit', compact('asset'));
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
		$asset = Asset::findOrFail($id);

		$asset->capital_id = $request->input("capital_id");
        $asset->name = $request->input("name");
        $asset->price = $request->input("price");
        $asset->value = $request->input("value");
        $asset->growth_rate = $request->input("growth_rate");
        $asset->pattern = $request->input("pattern");
        $asset->cycle_up = $request->input("cycle_up");
        $asset->cycle_down = $request->input("cycle_down");

		$asset->save();

		return redirect()->route('assets.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$asset = Asset::findOrFail($id);
		$asset->delete();

		return redirect()->route('assets.index')->with('message', 'Item deleted successfully.');
	}

}
