<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class test extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $qr;
    public function __construct($qr)
    {
        //
        $this->qr = $qr;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $qrcode = QrCode::format('png')->size(250)->generate('adsasdasdlajsd');
        return $this->view('mail.test')
                ->attachData($qrcode, 'qrcode.png' , [
                    'mime' => 'aplication/png'
                ])
        ;
    }
}
