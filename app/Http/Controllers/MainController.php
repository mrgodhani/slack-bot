<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use ThreadMeUp\Slack\Client;
use App\Http\Controllers\Controller;

class MainController extends Controller {

    public function index(Request $request)
    {
        $config = [
            'token' => 'xoxb-4651961255-P4bqtDfrfYnizSlLLRllJ0tn',
            'team' => 'cltron',
            'username' => 'meet',
            'icon' => 'ICON', // Auto detects if it's an icon_url or icon_emoji
            'parse' => '', // __construct function in Client.php calls for the parse parameter
        ];

        $slack = new Client($config);
        Log::info($request->all());
        $payload = $request->all();
        $incoming = $slack->listen($payload);
        if ($incoming)
        {
            switch($incoming->text())
            {
                case "Hi":
                    $incoming->respond("It is currently ".date('g:m A T'));
                    break;
                default:
                    $incoming->respond("I don't understand what you're asking.");
                    break;
            }
        }
    }

}