<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PharIo\Manifest\Library;
use App\Library\ApiUtil;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    public function index ()
    {
        return view('index');
    }

    public function search (Request $request)
    {
        //入力チェック
        $validator = $this->check($request);
        $input_zip = $request->zip;

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->with('zip', $input_zip);
        }

        $api = new ApiUtil();
        $response = $api->searchAddress('https://zipcloud.ibsnet.co.jp/api/search', ['zip' => $input_zip]);

        $body = json_decode( $response->body() );
        $addresses = $body->results;

        session()->flash('zip', $input_zip);

        if ( !isset($addresses) ) {
            return view('index',
                ['message' => "該当の住所はありません"]
            );
        }

        return view('index',
            ['addresses' => $addresses]
        );
    }

    public function check($request){
        $rulus   = ['zip'   => 'required|numeric|digits:7'];

        $message =  [
            'zip.required' => ':attributeは必須です',
            'zip.numeric'  => ':attributeは数字で入力してください',
            'zip.digits'   => ':attributeは半角数字7桁で入力してください'
        ];

        $name    =  ['zip' => '郵便番号'];

        return Validator::make($request->all(), $rulus, $message, $name);
    }
}
