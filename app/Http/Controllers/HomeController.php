<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\User;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		if (auth()->user() && auth()->user()->admin == true) {
			$listpengguna = User::all()->where("admin", "=", false);
			return view("pages.pengguna")->with("listpengguna", $listpengguna);
		}
		$listtransaksi = Transaction::where("user_id", auth()->user()->id)->get();
		$listtransaksi->load("hewan");
		return view('home')->with("listtransaksi", $listtransaksi);
	}
}
