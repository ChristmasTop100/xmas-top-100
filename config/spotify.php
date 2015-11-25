<?php

/*
 * Spotify settings.
 */
return [
	
	// Ask / generate these.
	'client_id' 	=> env('SPOTIFY_CLIENT_ID', ''),
	'client_secret' => env('SPOTIFY_CLIENT_SECRET', ''),

	// Default user and playlist.
	'user_id' 		=> 'robindrost',
	'playlist_id' 	=> '1qmMthdPjXr8wr6Qe1cjOe',

];