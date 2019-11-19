<?php

namespace App\Http\Controllers;
use App\Mail\test;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function SendMail(){
        $qr = "265+65+65";
        Mail::to('antoniojoseqp@hotmail.com')->send(new test($qr));
        return view('mail.test',  compact('qr'));
    }
}
