<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Pelaku_ekraf;
use DB;

class PostMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $kode_pelaku_ekraf;
    public $name;
    public function __construct($kode_pelaku_ekraf, $name)
    {
        $this->kode_pelaku_ekraf = $kode_pelaku_ekraf;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->subject('Verifikasi Pendaftaran Pelaku Ekraf')->view('email_verifikasi');
        //return $this->view('');
    }
}
