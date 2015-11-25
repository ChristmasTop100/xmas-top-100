<?php

namespace App\Http\Controllers;

/**
 * @package App\Http\Controllers
 */
class SongsController extends Controller
{

	/**
	 * @return \Illuminate\Http\Response 
	 */
	public function index()
	{
		return view('songs.index')->with([
			'songs' => Song::all(),
		]);
	}

}