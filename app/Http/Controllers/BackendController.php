<?php

namespace Funnel\Http\Controllers;

use Illuminate\Http\Request;

use Funnel\Ticket;

use Funnel\Http\Requests;
use Funnel\Http\Controllers\Controller;

class BackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       $carbon = new \Carbon\Carbon;
        $search = \Twitter::getSearch([
            'q' => '#funnelapp',
            'since' => $carbon->timezone('Asia/Kolkata')->subDay()->format('Y-m-d'),
            'count' => 10,
            'format' => 'object'
            ]);

        foreach ($search->statuses as $tweet) {
            $tags = $tweet->entities->hashtags;
            $hashtags = array_pluck($tags, 'text');
            //If the tweet has following terms
            if(in_array('funnelapp', $hashtags) && in_array('ticket', $hashtags)){
                $ticketExists = Ticket::where('tweet_id', $tweet->id_str)->first();
                if(!$ticketExists){
                    $priority = in_array('high', $hashtags) ? 'high' : 'low';
                    //Create new Ticket
                    $ticket = Ticket::create([
                        'content' => $tweet->text,
                        'tweet_id' => $tweet->id_str,
                        'tracking_id' => str_random(7),
                        'priority' => $priority
                        ]);

                    //Ticket was created
                    if($ticket){
                        $tweet = \Twitter::postTweet([
                            'status' => "@" . $tweet->user->screen_name . " we'll get back to you soon. Meanwhile, here's your ticket id: " . $ticket->tracking_id, 'in_reply_to_status_id' => $ticket->tweet_id, 'format' => 'object']);
                        dd($tweet);
                    }
                }
            }
        }
    }
}
