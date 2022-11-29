<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Thanks extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     * 送信されてきたデータ（$mail_data）を受け取る
     *
     * @return void
     */
    public function __construct($mail_data)
    {
        //受け取ったデータを他のメソッドでも使えるようにしている
        $this->mail_data = $mail_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.thanks'$this->mail_data)->subject('お買い上げありがとうございます');
    }
}
