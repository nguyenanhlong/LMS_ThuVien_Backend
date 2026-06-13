<?php

namespace App\Mail;

use App\Models\Book;
use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReservationConfirmedMail extends Mailable
{
    use Queueable, SerializesModels;

    public Reservation $reservation;
    public ?Book $book;

    public function __construct(Reservation $reservation, ?Book $book = null)
    {
        $this->reservation = $reservation;
        $this->book = $book;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Xác nhận đặt trước sách - LMS ThuVien',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.reservation-confirmed',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
