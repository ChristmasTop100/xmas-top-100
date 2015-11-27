<?php

namespace App\Console\Commands;

use App\Song;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;
use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;

/**
 * @package App\Console\Commands
 */
class Spotify extends Command
{

	/**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'spotify:index';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the Spotify playlist from spotify and insert it into the database..';

    /**
     * Implements the handle method.
     */
    public function handle()
    {
        $session    = new Session(config('spotify.client_id'), config('spotify.client_secret'), null);
        $api        = new SpotifyWebAPI();

        $session->requestCredentialsToken([]);
        $accessToken = $session->getAccessToken(); // We're good to go!

        // Set the code on the API wrapper
        $api->setAccessToken($accessToken);

        $playlist = $api->getUserPlaylist(config('spotify.user_id'), config('spotify.playlist_id'));
    	$tracks   = [];

        Song::truncate();

    	foreach ($playlist->tracks->items as $item) {
            $tracks[] = [
                'image' => $item->track->album->images[0]->url,
                'url'   => $item->track->external_urls->spotify,
                'name'  => $item->track->name,
                'artist' => collect($item->track->artists)->implode('name', ', '),
            ];
        }

        Song::insert($tracks);
    }  
}