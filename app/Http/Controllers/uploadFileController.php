<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadFileController extends Controller
{
    private $key ;
    private $iv ;
    private $cipher ;

    public function __construct()
    {
        $this->key = config('app.key');
        $this->iv = config('app.iv');
        $this->cipher = config('app.cipher');
    }

    function upload()
    {
        return view("upload");
    }
    function uploadPost(Request $request)
    {
        $file =  $request->file('file');
        $fileName = $file->getClientOriginalName();
        $contents = file_get_contents($file);
        return $this->handleOperation($request->opType, $contents, $fileName);
    }
    private function handleOperation($operation, $contents, $fileName)
    {
        $key = $this->key;
        $iv = $this->iv;
        $cipher = $this->cipher;
        if ($operation === "encrypt") {
            $encryptedContent = openssl_encrypt($contents, $cipher, $key,  0, $iv);
            Storage::put('public/encrypted_files/' . $fileName, $encryptedContent);
            $download =  Storage::download('public/encrypted_files/' . $fileName);
            app()->terminating(function () use ($fileName) {
                storage::delete('public/encrypted_files/' . $fileName);
            });
            return $download;
        } else if ($operation === "decrypt") {
            $decryptedContent = openssl_decrypt($contents, $cipher, $key,  0, $iv);
            Storage::put('public/decrypted_files/' . $fileName, $decryptedContent);
            $download =  Storage::download('public/decrypted_files/' . $fileName);
            app()->terminating(function () use ($fileName) {
                Storage::delete('public/decrypted_files/' . $fileName);
            });
            return $download;
        }
    }
    private function operate($operation){
        
    }
}
