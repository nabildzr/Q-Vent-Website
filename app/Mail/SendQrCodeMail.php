<?php

namespace App\Mail;

use App\Models\Event;
use App\Models\Attendee;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendQrCodeMail extends Mailable
{
    public $event;
    public $attendee;
    public $qrBinary;
    public $qrFilename;

    public function __construct(Event $event, Attendee $attendee, $qrBinary, $qrFilename)
    {
        $this->event      = $event;
        $this->attendee   = $attendee;
        $this->qrBinary   = $qrBinary;
        $this->qrFilename = $qrFilename;
    }

    public function build()
    {
        return $this->subject('QR Code untuk Event: ' . $this->event->title)
            ->view('emails.qr_code')
            ->with([
                'event'    => $this->event,
                'attendee' => $this->attendee,
            ])
            // simpan QR ke storage sementara
            ->attachData($this->qrBinary, $this->qrFilename, ['mime' => 'image/png']);
    }
}
