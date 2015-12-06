<?php

namespace App\Http\Controllers;

use App\Song;
use App\Vote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
			'songs' => Song::with(['vote' => function ($query) {
				$query->where('user_id', Auth::user()->id);
			}])->get(),
		]);
	}

	public function vote(Request $request)
	{
		$this->validate($request, [
			'id' => 'required', 'score' => 'required',
		]);

		$data = $request->only('id', 'score');
		$currentTotal = Vote::where('user_id', Auth::user()->id)
			->sum('score');

		if (($currentTotal + $data['score']) <= 100) {
			$vote = Vote::firstOrNew([
				'user_id' => Auth::user()->id,
				'song_id' => $data['id']]
			);

			$vote->score = $data['score'];
			$vote->save();
			return json_encode(['score!']);
		}
	}

}