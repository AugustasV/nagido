<?php

namespace App\accSystem;

class getUserFromToken
{
    /**
     * @param $token
     * @param $client
     * @return bool
     */
    public function getUser($token, $client)
    {
        $ticket = $client->verifyIdToken($token);
        if ($ticket)
        {
            return $ticket;
        }
        return false;
    }
}