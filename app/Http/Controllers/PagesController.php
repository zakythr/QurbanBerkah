<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Hewan;

class PagesController extends Controller
{
	public function home()
	{
		return view("pages.homepage");
	}

	public function hewan()
	{
		return view("pages.hewan");
	}

	public function tambahhewan()
	{
		return view("pages.tambahhewan");
	}

	public function edithewan()
	{
		return view("pages.edithewan");
	}

	public function angsuran()
	{
		return view("pages.angsuran");
	}

	public function pakan()
	{
		return view("pages.pakan");
	}

	public function pengguna()
	{
		$pengguna = User::all()->where("admin", "=", "0");
		return view("pages.pengguna")->with("pengguna", $pengguna);
	}

	public function tambahpengguna()
	{
		return view("pages.tambahpengguna");
	}

	public function editpengguna()
	{
		return view("pages.editpengguna");
	}

	public function cicilan1()
	{
		return view("pages.cicilan1");
	}

	public function cicilan2()
	{
		return view("pages.cicilan2");
	}

	public function cicilan3()
	{
		return view("pages.cicilan3");
	}

	public function cicilan4()
	{
		return view("pages.cicilan4");
	}

	public function cicilan5()
	{
		return view("pages.cicilan5");
	}

	public function cicilan6()
	{
		return view("pages.cicilan6");
	}
}
