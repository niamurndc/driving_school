<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{
    public static function send_sms($phone, $text) {
        $url = "https://esms.mimsms.com/smsapi";
        $data = [
          "api_key" => "C20070255f672e1595acf7.75675552",
          "type" => "unicode",
          "contacts" => '88'.$phone,
          "senderid" => "8809601000185",
          "msg" => $text,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}
