<?php

namespace App\Mail;

use App\Models\Book;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $book;
    protected $user;

    public function __construct(Book $book, User $user)
    {
        $this->book = $book;
        $this->user = $user;
    }

    public function build()
    {
        return $this->view('emails.book_notification')
                    ->with([
                        'book' => $this->book,
                        'user' => $this->user,
                    ])
                    ->subject('New Book Added');
    }
}
