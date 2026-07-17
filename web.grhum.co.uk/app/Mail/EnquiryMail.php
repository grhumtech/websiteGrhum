<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Enquiry;

class EnquiryMail extends Mailable
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
        $subject = $this->mailSubject ?: (
            'New Enquiry - Action Required - ('
            . $this->enquiry->enq_code . ') '
            . $this->enquiry->address . ' '
            . $this->enquiry->city
        );

        $mail = $this
            ->from($from, 'Grhum')
            ->subject($subject)
            ->view('emails.enquiry')
            ->with([
                'data' => [
                    'company_name' => $this->payload['company_name'] ?? '',
                    'full_name' => $this->payload['full_name'] ?? '',
                    'email_id' => $this->payload['email_id'] ?? '',
                    'mobile' => $this->payload['mobile'] ?? '',
                    'check_in' => $this->payload['check_in'] ?? '',
                    'check_out' => $this->payload['check_out'] ?? '',
                    'budget' => $this->payload['budget'] ?? '',
                    'guest_details' => $this->payload['guest_details'] ?? '',
                    'enquiry_text' => $this->payload['enquiry_text'] ?? '',
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