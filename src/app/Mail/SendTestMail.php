<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendTestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build($a,$email,$text,$category,$plan)
    {
        return $this->view('emails.contact')
                ->to('XXXXX@XXXXX.jp','鈴木太郎')
                ->from('XXX@XXXX','佐藤一郎')
                ->subject('テストメールです。');
    }
}
