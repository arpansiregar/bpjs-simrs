<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BPJSController extends Controller
{

    public $baseUrl = 'http://192.168.2.45/wswaled/api/';
    // public $baseUrl = 'http://103.94.5.214:83/wswaled/api/';

    public function rest(Request $request)
    {
        $response = Http::withHeaders([
            'x-username' => $request->header('x-username'),
            'x-password' => $request->header('x-password')
        ])->get($this->baseUrl . 'Rest');
        $response = json_decode($response, true);
        return $response;
    }

    public function jadwaloperasi(Request $request)
    {
        $response = Http::withHeaders([
            'x-username' => $request->header('x-username'),
            'x-token' => $request->header('x-token')
        ])->post($this->baseUrl . 'jadwaloperasi', [
            'tanggalawal' => $request->tanggalawal,
            'tanggalakhir' => $request->tanggalakhir,
        ]);

        $response = json_decode($response, true);
        return $response;
    }
}
