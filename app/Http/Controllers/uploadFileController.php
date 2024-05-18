<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class uploadFileController extends Controller
{
    private $key = "";
    private $iv = "";
    private $cipher = "";

    public function __construct()
    {
        $this->key = env("KEY");
        $this->iv = env("IV");
        $this->cipher = env("CIPHER");
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
        return $this->operation($request->opType, $contents, $fileName);
    }
    function operation($operation, $contents, $fileName)
    {
        $key = $this->key;
        $iv = $this->iv;
        $cipher = $this->cipher;
        if ($operation == "encrypt") {
            $encryptedContent = openssl_encrypt($contents, $cipher, $key,  0, $iv);
            Storage::put('public/encrypted_files/' . $fileName, $encryptedContent);
            $download =  Storage::download('public/encrypted_files/' . $fileName);
            app()->terminating(function () use ($fileName) {
                storage::delete('public/encrypted_files/' . $fileName);
            });
            return $download;
        } else if ($operation == "decrypt") {
            $decryptedContent = openssl_decrypt($contents, $cipher, $key,  0, $iv);
            Storage::put('public/decrypted_files/' . $fileName, $decryptedContent);
            $download =  Storage::download('public/decrypted_files/' . $fileName);
            app()->terminating(function () use ($fileName) {
                storage::delete('public/decrypted_files/' . $fileName);
            });
            return $download;
        }
    }
}
