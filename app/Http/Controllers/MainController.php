<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use ThreadMeUp\Slack\Client;
use App\Http\Controllers\Controller;

class MainController extends Controller {

    public function index()
    {
        $config = [
            'token' => 'xoxb-4650457057-WggMPzIDpd1DRqscF2KKtx6O',
            'team' => 'cltron',
            'username' => 'celertron',
            'icon' => 'ICON', // Auto detects if it's an icon_url or icon_emoji
            'parse' => '', // __construct function in Client.php calls for the parse parameter
        ];

        $slack = new Client($config);
        Log::info(Request::all());
        $payload = Request::all();
        $incoming = $slack->listen($payload);
    }

}