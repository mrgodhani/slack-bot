<?php namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Log;
use ThreadMeUp\Slack\Client;
use App\Http\Controllers\Controller;

class MainController extends Controller {

    public function index()
    {
        $config = [
            'token' => 'xoxb-4651961255-P4bqtDfrfYnizSlLLRllJ0tn',
            'team' => 'cltron',
            'username' => 'meet',
            'icon' => 'ICON', // Auto detects if it's an icon_url or icon_emoji
            'parse' => '', // __construct function in Client.php calls for the parse parameter
        ];

        $slack = new Client($config);
        Log::info(Request::all());
        $payload = Request::all();
        $incoming = $slack->listen($payload);
    }

}