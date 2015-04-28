<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use ThreadMeUp\Slack\Client;

class Controller extends BaseController
{
    public function index()
    {
        $config = [
            'token' => 'USER-API-TOKEN',
            'team' => 'YOUR-TEAM',
            'username' => 'BOT-NAME',
            'icon' => 'ICON', // Auto detects if it's an icon_url or icon_emoji
            'parse' => '', // __construct function in Client.php calls for the parse parameter
        ];

        $slack = new Client($config);
    }
}
