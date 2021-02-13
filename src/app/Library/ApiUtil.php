<?php
namespace App\Library;
use Illuminate\Support\Facades\Http;

class ApiUtil
{
    public function searchAddress ($url, $params = array() )
    {
        try {
            // APIコール
            return Http::get(
                $url,
                [
                    'zipcode' => $params['zip']
                ]
            );
        } catch (\Exception $e) {
            echo 'エラー:' . $e->getMessage();
        }
    }
}
