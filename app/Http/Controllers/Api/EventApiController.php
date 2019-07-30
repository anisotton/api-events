<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;

class EventApiController extends Controller
{
    public function __construct(Event $event, Request $request)
    {
        $this->event = $event;
        $this->request = $request;
    }

    public function index(){
        $data = $this->event->all();
        return response()->json('oi');
    }
}
