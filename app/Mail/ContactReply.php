<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactReply extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;
    public $replyMessage;

    public function __construct(Contact $contact, $replyMessage)
    {
        $this->contact = $contact;
        $this->replyMessage = $replyMessage;
    }

    public function build()
    {
        return $this->markdown('emails.contact.reply')
            ->subject('Phản hồi từ chúng tôi')
            ->with([
                'contactName' => $this->contact->name,
                'replyMessage' => $this->replyMessage
            ]);
    }
}