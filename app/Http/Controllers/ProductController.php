<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

/**
 * Class ProductController
 *
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    protected $client;

    /**
     * ProductController constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Display a listing of the resource.
     *
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function index()
    {
        dd(json_decode($this->client->request('get',
            'https://online.moysklad.ru/api/remap/1.1/entity/product/a9be6613-d90d-11e7-7a69-8f550015063d',
            ['headers' => [
                    'Authorization'=>'Basic YWRtaW5Adm9za3Jlc2Vuc3JpeTpwZHNNLTA3',
                    'Content-Type' => 'application/json;charset=utf-8'
                ]]
        )->getBody()->getContents()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param $url
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
//    public function endpointRequest($url)
//    {
//        try {
//            $response = $this->client
//                ->request('GET', $url);
//        } catch (\Exception $e) {
//            dd($e);
//            return [];
//        }
//        dd($response->getBody()->getContents());
//        return $this->response_handler($response->getBody()->getContents());
//    }

    /**
     * @param $response
     * @return array|mixed
     */
//    public function response_handler($response)
//    {
//        if ($response) {
//            return json_decode($response);
//        }
//
//        return [];
//    }
}
