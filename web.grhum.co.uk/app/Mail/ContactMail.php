<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Enquiry;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    private Enquiry $enquiry;
    private string $fromEmail;
    private array $ccList;
    private string $mailSubject;

    public function __construct(
        $payload,
        string $fromEmail = '',
        array $ccList = [],
        string $mailSubject = '',
    ) {
        $this->payload = $payload;
        $this->fromEmail = $fromEmail;
        $this->ccList = $ccList;
        $this->mailSubject = $mailSubject;
    }

    public function build(): self
    {
        $from = $this->fromEmail ?: config('mail.from.address');

        $mail = $this
            ->from($from, 'Grhum')
            ->subject($this->mailSubject)
            ->view('emails.contact_us')
            ->with([
                'data' => [
                    'full_name' => $this->payload['first_name'].' '.$this->payload['last_name'],
                    'email' => $this->payload['email'] ?? '',
                    'contact_number' => $this->payload['contact_number'] ?? '',
                    'enquiry_type' => $this->payload['enquiry_type'] ?? '',
                    'message' => $this->payload['message'] ?? '',
                ],
                'fromEmail' => $this->fromEmail,
                'mailSubject' => $this->mailSubject,
            ]);
        if (!empty($this->ccList)) {
            $mail->cc($this->ccList);
        }

        return $mail;
    }
}