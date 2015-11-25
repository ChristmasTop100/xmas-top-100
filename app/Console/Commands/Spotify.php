<?php

namespace App\Console\Commands;

use App\Song;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

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
    protected $description = 'Index the spotify play list located inside the storage directory.';

    /**
     * Implements the handle method.
     */
    public function handle()
    {
    	$tracks   = [];
    	$playlist = file_get_contents(storage_path() . '/spotify/playlist.json');

    	if ($playlist && null !== $playlist) {
    		$data = json_decode($playlist);

    		foreach ($data->tracks->items as $item) {
    			$tracks[] = [
    				'image' => $item->track->album->images[0]->url,
    				'url' 	=> $item->track->href,
    				'name' 	=> $item->track->name,
    			];
    		}

    		Song::insert($tracks);
    	}
    }
}