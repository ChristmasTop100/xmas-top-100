<?php
namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;

/**
 * @package App\Console\Commands
 */
class OneTimeLogin extends Command
{
	/**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'onetimelogin:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an one time login to all the users.';

	/**
	 * Send an e-mail to all the users with a password reset link.
	 */
	public function handle()
	{
		User::get()->each(function($user) {
			Password::sendResetLink($user->email, function (Message $message) {
	            $message->subject(trans('onetimelogin.subject'));
	        });
		});


	}

}