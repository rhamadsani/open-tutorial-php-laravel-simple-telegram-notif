<?php

namespace App\Services;

use Exception;

class Telegram {
    

    public static function getMe()
    {
        return static::curlHelp('GET', 'getMe');
    }

    public static function getUpdates()
    {  
        return static::curlHelp('GET', 'getUpdates');
    }

    public static function sendMessage($chat_id, $parse_mode, $content)
    {
        $params = 'chat_id='.$chat_id.'&parse_mode='.$parse_mode.'&text='.$content;

        return static::curlHelp('GET', 'sendMessage', $params);
    }
    
    private static function curlHelp($method, $link, $params = false, $payload = false)
    {
        $base_url = 'https://api.telegram.org/';
        $token = "yourtoken";

        $headers = [
            // 'Content-Type: application/json',
            "Content-Type:multipart/form-data"
        ];
    
        $url = $base_url.'bot'.$token.'/'.$link.'?'.$params;

        $ch = curl_init();
    
        curl_setopt($ch, CURLOPT_URL, $url);
        if($method == 'POST' || $method == 'post'){
            curl_setopt($ch, CURLOPT_POST, true);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if($payload){
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        }
        
        $output = curl_exec($ch);

        return $output;
    }
}
