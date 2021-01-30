<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Hewan;
use App\GambarHewan;

class HewanController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		if (auth()->user() && auth()->user()->admin == true) {
			//$listhewan = Hewan::with("gambarhewan")->where("status", "=", false)->get();
			$listhewan = Hewan::with("gambarhewan")->get();
		}
		else {
			//$listhewan = Hewan::with("gambarhewan")->get();
			$listhewan = Hewan::with("gambarhewan")->where("status", "=", false)->get();
		}
		return view("pages.hewan")->with("listhewan", $listhewan);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view("pages.tambahhewan");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			"nama" => "required",
			"deskripsi" => "required",
			"harga" => "required|numeric",
			"gambarhewan[]" => "nullable|image"
		]);

		$hewan = new Hewan();
		$hewan->nama = $request->input("nama");
		$hewan->deskripsi = $request->input("deskripsi");
		$hewan->harga = $request->input("harga");
		$hewan->save();

		if ($request->has("gambarhewan")) {
			foreach ($request->file("gambarhewan") as $value) {
				$gambar = new GambarHewan();
				$gambar->hewan_id = $hewan->id;
				$fullname = $value->getClientOriginalName();
				$filename = pathinfo($fullname, PATHINFO_FILENAME);
				$ext = $value->getClientOriginalExtension();
				$timenow = time();
				$storedname = "{$filename}_{$timenow}.{$ext}";
				$value->storeAs("public", $storedname);
				$gambar->path = $storedname;
				$gambar->save();
			}
		}

		return redirect("/hewan")->with("success", "Hewan berhasil ditambah");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$hewan = Hewan::find($id);
		return view("pages.detailhewan")->with("hewan", $hewan);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$hewan = Hewan::find($id);
		$hewan->load("gambarhewan");
		return view("pages.edithewan")->with("hewan", $hewan);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$this->validate($request, [
			"nama" => "required",
			"deskripsi" => "required",
			"harga" => "required|numeric",
			"gambarhewan[]" => "nullable|image"
		]);

		$hewan = Hewan::find($id);
		$hewan->load("gambarhewan");
		$hewan->nama = $request->input("nama");
		$hewan->deskripsi = $request->input("deskripsi");
		$hewan->harga = $request->input("harga");
		foreach ($hewan->gambarhewan as $value) {
			if ($request->input(str_replace([" ", ".", "["], "_", $value->path)) == "hapus") {
				$value->delete();
			}
		}
		if ($request->has("gambarhewan")) {
			foreach ($request->file("gambarhewan") as $value) {
				$gambar = new GambarHewan();
				$gambar->hewan_id = $hewan->id;
				$fullname = $value->getClientOriginalName();
				$filename = pathinfo($fullname, PATHINFO_FILENAME);
				$ext = $value->getClientOriginalExtension();
				$timenow = time();
				$storedname = "{$filename}_{$timenow}.{$ext}";
				$value->storeAs("public", $storedname);
				$gambar->path = $storedname;
				$gambar->save();
			}
		}
		$hewan->save();

		return redirect("/hewan")->with("success", "Hewan berhasil diubah");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$hewan = Hewan::find($id);
		$hewan->load("gambarhewan");
		$hewan->load("transaksi");
		foreach ($hewan->gambarhewan as $value) {
			Storage::delete("public/{$value->path}");
			$value->delete();
		}
		foreach ($hewan->transaksi as $value) {
			$value->delete();
		}
		$hewan->delete();
		return redirect("/hewan")->with("success", "Hewan berhasil dihapus");
	}
}
