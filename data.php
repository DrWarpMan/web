<?php

require("./config.php");

const VOTES = "ts_votes";
const ONLINE = "ts_online";
const UNIQUE = "ts_unique";

require_once './vendor/autoload.php';
use Phpfastcache\CacheManager;
$cache = CacheManager::getInstance('files');

/*
* RETURN DATA
*/

function getData() {
    return [
        "votes" => ts_votes(),
        "newMembers" => ts_unique(),
        "online" => ts_online()
    ];
}

/*
* FUNCTIONS
*/

function ts_online() {
    try {
        global $cache;

        $online = $cache->getItem(ONLINE);

        if ($online->isHit()) {            
            return $online->get();
        } else {
            $response = tsQuery("clientlist?-uid");

            if($response === false || $response->status->code != 0) throw new Exception("Invalid response!");
        
            $clients = $response->body;
            $clients = array_filter($clients, function($client) {
                return $client->client_type == 0 && // filter query
                !in_array($client->client_unique_identifier, qBots); // filter bots
            });
            
            $online->set(count($clients))->expiresAfter(60);
            $cache->save($online);
            return $online->get();
        }
    } catch(Exception $e) {
        //var_dump($e);
        return -1;
    }
}

function ts_unique() {
    try {
        global $cache;

        $uniqueAmount = $cache->getItem(UNIQUE);

        if($uniqueAmount->isHit()) {
            return $uniqueAmount->get();
        } else {
            $max = 200;
            $allofem = false;
            $clients = [];
            $connections = 3;

            for($i = 0; $allofem === false; $i += $max)
            {
                $response = tsQuery("clientdblist?duration=$max&start=$i");

                if($response === false || $response->status->code != 0) throw new Exception("Invalid response!");

                $tempClients = $response->body;

                array_push($clients, ...$tempClients);
                
                if(count($tempClients) !== $max)
                    $allofem = true;
            }
        
            $unique = array_filter($clients, function($client) use ($connections) {
                return $client->client_totalconnections >= $connections && // has min. connections?
                date("Y/M", $client->client_created) === date("Y/M"); // is from this month?
            });

            $uniqueAmount->set(count($unique))->expiresAfter(300);
            $cache->save($uniqueAmount);
            return $uniqueAmount->get();
        }
    } catch(Exception $e) {
        //var_dump($e);
        return -1;
    }
}

function ts_votes() {
    try {
        global $cache;

        $votesCount = $cache->getItem(VOTES);

        if(false/*$votesCount->isHit()*/) {
            return $votesCount->get();
        } else {
            $response = voteQuery("clientlist");

            if($response === false) throw new Exception("Invalid response!");
        
            $votes = $response->votes;

            $votesCount->set($votes)->expiresAfter(300);
            $cache->save($votesCount);
            return $votesCount->get();
        }
    } catch(Exception $e) {
        //var_dump($e);
        return -1;
    }
}

/*
* HTTP REQUESTS
*/

function tsQuery($params = "")
{    
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => qURL . $params,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT => 3,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'x-api-key: ' . qKey
      ),
    ));
    
    $response = curl_exec($curl);
    curl_close($curl);

    return json_decode($response);
}

function voteQuery()
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => voteURL,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT => 3,
      CURLOPT_CUSTOMREQUEST => 'GET'
    ));
    
    $response = curl_exec($curl);
    curl_close($curl);

    return json_decode($response);
}