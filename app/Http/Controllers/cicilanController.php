<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cicilan;

class cicilanController extends Controller
{
	public function beli($tipehewan, $id)
	{
		$cicilan = new Cicilan();
		$cicilan->user_id = auth()->user()->id;
		$cicilan->jenishewan = $tipehewan;
		if ($tipehewan == "kambing") {
			if ($id == 1) {
				$cicilan->durasi = 6;
			}
			if ($id == 2) {
				$cicilan->durasi = 12;
			}
			if ($id == 3) {
				$cicilan->durasi = 20;
			}
		} else {
			if ($id == 4) {
				$cicilan->durasi = 12;
			}
			if ($id == 5) {
				$cicilan->durasi = 24;
			}
			if ($id == 6) {
				$cicilan->durasi = 48;
			}
		}
		//return $cicilan;
		$cicilan->save();

		return redirect("angsuran/cicilan/finishcicilan")->with("success", "Cicilan Berhasil");
	}

	public function index()
	{
		$listcicilan = Cicilan::all()->where("user_id", "=", auth()->user()->id);
		return view("pages.finishcicilan")->with("listcicilan", $listcicilan);
	}

	public function batal($id)
	{
		$batalcicil = Cicilan::find($id);
		$batalcicil->delete();
		return redirect("angsuran/cicilan/finishcicilan")->with("success", "Cicilan Batal");
	}

	public function lihat($id) {
		$cicilan = Cicilan::find($id);
		if ($cicilan->jenishewan == "kambing") {
			switch ($cicilan->durasi) {
				case 6:
					$perbulan = 500000;
					break;
				case 12:
					$perbulan = 250000;
					break;
				case 20:
					$perbulan = 150000;
					break;
				default:
					$perbulan = -1;
			}
		}
		else if ($cicilan->jenishewan == "sapi") {
			switch ($cicilan->durasi) {
				case 12:
					$perbulan = 1250000;
					break;
				case 24:
					$perbulan = 625000;
					break;
				case 48:
					$perbulan = 312500;
					break;
				default:
					$perbulan = -1;
			}
		}
		$data = [
			"cicilan" => $cicilan,
			"perbulan" => $perbulan
		];
		//return $data;
		return view("pages.detailcicilan")->with("data", $data);
	}
}
