<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BPJSController extends Controller
{

    // public $baseUrl = 'http://192.168.2.45/wswaled/api/';
    // public $baseUrl = 'http://103.94.5.214:83/wswaled/api/';
    public $baseUrl = ' http://103.94.5.210/antrian/api/';

    public function rest(Request $request)
    {
        $response = Http::withHeaders([
            'x-username' => $request->header('x-username'),
            'x-password' => $request->header('x-password')
        ])->get($this->baseUrl . 'token');
        $response = json_decode($response, true);
        return $response;
    }

    public function statusantrean(Request $request)
    {
        $response = Http::withHeaders([
            'x-username' => $request->header('x-username'),
            'x-token' => $request->header('x-token')
        ])->asForm()->post($this->baseUrl . 'wsrs/status_antrian', [
            'kodepoli' => $request->kodepoli,
            'kodedokter' => $request->kodedokter,
            'tanggalperiksa' => $request->tanggalperiksa,
            'jampraktek' => $request->jampraktek,
        ]);
        $response = $response->json();
        return $response;
    }

    public function ambilantrean(Request $request)
    {
        $response = Http::withHeaders([
            'x-username' => $request->header('x-username'),
            'x-token' => $request->header('x-token')
        ])->asForm()->post($this->baseUrl . 'ambilantrean', [
            'nomorkartu' => $request->nomorkartu,
            'nik' => $request->nik,
            'nohp' => $request->nohp,
            'kodepoli' => $request->kodepoli,
            'norm' => $request->norm,
            'tanggalperiksa' => $request->tanggalperiksa,
            'kodedokter' => $request->kodedokter,
            'jampraktek' => $request->jampraktek,
            'jeniskunjungan' => $request->jeniskunjungan,
            'nomorreferensi' => $request->nomorreferensi,
        ]);
        $response = $response->json();
        return $response;
    }

    public function sisaantrean(Request $request)
    {
        $response = Http::withHeaders([
            'x-username' => $request->header('x-username'),
            'x-token' => $request->header('x-token')
        ])->asForm()->post($this->baseUrl . 'sisaantrean', [
            'kodebooking' => $request->kodebooking,
        ]);

        $response = $response->json();
        return $response;
    }

    public function batalantrean(Request $request)
    {
        $response = Http::withHeaders([
            'x-username' => $request->header('x-username'),
            'x-token' => $request->header('x-token')
        ])->asForm()->post($this->baseUrl . 'batalantrean', [
            'kodebooking' => $request->kodebooking,
            'keterangan' => $request->keterangan,
        ]);
        $response = $response->json();
        return $response;
    }

    public function checkin(Request $request)
    {
        $response = Http::withHeaders([
            'x-username' => $request->header('x-username'),
            'x-token' => $request->header('x-token')
        ])->asForm()->post($this->baseUrl . 'checkin', [
            'kodebooking' => $request->kodebooking,
            'waktu' => $request->waktu,
        ]);
        // dd($request->all());
        $response = $response->json();
        return $response;
    }

    public function infoPasienBaru(Request $request)
    {
        $response = Http::withHeaders([
            'x-username' => $request->header('x-username'),
            'x-token' => $request->header('x-token')
        ])->asForm()->post($this->baseUrl . 'infoPasienBaru', [
            'nomorkartu' => $request->nomorkartu,
            'nik' => $request->nik,
            'nomorkk' => $request->nomorkk,
            'nama' => $request->nama,
            'jeniskelamin' => $request->jeniskelamin,
            'tanggallahir' => $request->tanggallahir,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'kodeprop' => $request->kodeprop,
            'namaprop' => $request->namaprop,
            'kodedati2' => $request->kodedati2,
            'namadati2' => $request->namadati2,
            'kodekec' => $request->kodekec,
            'namakec' => $request->namakec,
            'kodekel' => $request->kodekel,
            'namakel' => $request->namakel,
            'rw' => $request->rw,
            'rt' => $request->rt,
        ]);
        $response = $response->json();
        return $response;
    }

    public function jadwaloperasi(Request $request)
    {
        $response = Http::withHeaders([
            'x-username' => $request->header('x-username'),
            'x-token' => $request->header('x-token')
        ])->asForm()->post($this->baseUrl . 'jadwaloperasi', [
            'tanggalawal' => $request->tanggalawal,
            'tanggalakhir' => $request->tanggalakhir,
        ]);

        $response = $response->json();
        return $response;
    }

    public function jadwaloperasipasien(Request $request)
    {
        $response = Http::withHeaders([
            'x-username' => $request->header('x-username'),
            'x-token' => $request->header('x-token')
        ])->asForm()->post($this->baseUrl . 'jadwaloperasipasien', [
            'nopeserta' => $request->nopeserta,
        ]);
        $response = $response->json();
        return $response;
    }
}
