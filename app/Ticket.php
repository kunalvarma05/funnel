<?php

namespace Funnel;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tickets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['content', 'status', 'priority', 'tweet_id', 'tracking_id'];
}
