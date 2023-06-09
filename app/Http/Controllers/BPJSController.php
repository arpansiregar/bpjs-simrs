<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BPJSController extends Controller
{

    // public $baseUrl = 'http://192.168.2.45/wswaled/api/';
    // public $baseUrl = 'http://103.94.5.214:83/wswaled/api/';
    public $baseUrl = "http://103.158.96.141/siramah/api/";

    public function token(Request $request)
    {
        $response = Http::withHeaders([
            'x-username' => $request->header('x-username'),
            'x-password' => $request->header('x-password')
        ])->get($this->baseUrl . 'antrian/token');
        return json_decode($response);
    }

    public function statusantrean(Request $request)
    {
        $response = Http::withHeaders([
            'x-username' => $request->header('x-username'),
            'x-token' => $request->header('x-token')
        ])->asForm()->post($this->baseUrl . 'antrian/status_antrian', [
            'kodepoli' => $request->kodepoli,
            'kodedokter' => $request->kodedokter,
            'tanggalperiksa' => $request->tanggalperiksa,
            'jampraktek' => $request->jampraktek,
        ]);
        return json_decode($response);
    }

    public function ambilantrean(Request $request)
    {
        $response = Http::withHeaders([
            'x-username' => $request->header('x-username'),
            'x-token' => $request->header('x-token')
        ])->asForm()->post($this->baseUrl . 'antrian/ambil_antrian', [
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
        return json_decode($response);
    }

    public function sisaantrean(Request $request)
    {
        $response = Http::withHeaders([
            'x-username' => $request->header('x-username'),
            'x-token' => $request->header('x-token')
        ])->asForm()->post($this->baseUrl . 'antrian/sisa_antrian', [
            'kodebooking' => $request->kodebooking,
        ]);
        return json_decode($response);
    }

    public function batalantrean(Request $request)
    {
        $response = Http::withHeaders([
            'x-username' => $request->header('x-username'),
            'x-token' => $request->header('x-token')
        ])->asForm()->post($this->baseUrl . 'antrian/batal_antrian', [
            'kodebooking' => $request->kodebooking,
            'keterangan' => $request->keterangan,
        ]);
        return json_decode($response);
    }

    public function checkin(Request $request)
    {
        $response = Http::withHeaders([
            'x-username' => $request->header('x-username'),
            'x-token' => $request->header('x-token')
        ])->asForm()->post($this->baseUrl . 'antrian/checkin_antrian', [
            'kodebooking' => $request->kodebooking,
            'waktu' => $request->waktu,
        ]);
        return json_decode($response);
    }

    public function infopasienbaru(Request $request)
    {
        $response = Http::withHeaders([
            'x-username' => $request->header('x-username'),
            'x-token' => $request->header('x-token')
        ])->asForm()->post($this->baseUrl . 'antrian/info_pasien_baru', [
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
        return json_decode($response);
    }

    public function jadwaloperasi(Request $request)
    {
        $response = Http::withHeaders([
            'x-username' => $request->header('x-username'),
            'x-token' => $request->header('x-token')
        ])->asForm()->post($this->baseUrl . 'antrian/jadwal_operasi_rs', [
            'tanggalawal' => $request->tanggalawal,
            'tanggalakhir' => $request->tanggalakhir,
        ]);
        return json_decode($response);
    }

    public function jadwaloperasipasien(Request $request)
    {
        $response = Http::withHeaders([
            'x-username' => $request->header('x-username'),
            'x-token' => $request->header('x-token')
        ])->asForm()->post($this->baseUrl . 'antrian/jadwal_operasi_pasien', [
            'nopeserta' => $request->nopeserta,
        ]);
        return json_decode($response);
    }
    public function ambilantreanfarmasi(Request $request)
    {
        $response = Http::withHeaders([
            'x-username' => $request->header('x-username'),
            'x-token' => $request->header('x-token')
        ])->asForm()->post($this->baseUrl . 'antrian/ambil_antrian_farmasi', [
            'kodebooking' => $request->kodebooking,
        ]);
        return json_decode($response);
    }
    public function statusantreanfarmasi(Request $request)
    {
        $response = Http::withHeaders([
            'x-username' => $request->header('x-username'),
            'x-token' => $request->header('x-token')
        ])->asForm()->post($this->baseUrl . 'antrian/status_antrian_farmasi', [
            'kodebooking' => $request->kodebooking,
        ]);
        return json_decode($response);
    }
}
