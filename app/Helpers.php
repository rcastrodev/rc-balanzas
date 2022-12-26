<?php

use App\Client;


if (! function_exists('client')) {
    function client()
    {
        return Client::find(session('user_id'));
    }
}