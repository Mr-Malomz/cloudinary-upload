<?php

namespace App\Http\Controllers;

use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Configuration\Configuration;
use Illuminate\Http\Request;

Configuration::instance([
    'cloud' => [
        'cloud_name' => env('CLOUD_NAME'),
        'api_key' => env('API_KEY'),
        'api_secret' => env('API_SECRET')
    ],
    'url' => [
        'secure' => true
    ]
]);

class UploadController extends Controller
{
    public function FileUpload(Request $req)
    {
        $file = $req->file('file')->getRealPath();
        $upload = (new UploadApi())->upload($file, [
            'resource_type' => 'video', 
            'chunk_size' => 6000000,
        ]);

        return ["result" => $upload['url']];
    }
}
