<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Jobs\BookNotification;
use Illuminate\Support\Facades\Queue;
use Log;

class NotificationController extends Controller
{
    public function sendNotification(Request $request, Book $book)
    {
        $users = User::whereNotNull('email_verified_at')->get();
        foreach ($users as $user) {
            $job = (new BookNotification($book, $user))->onQueue('default');
            Log::info(Queue::push($job));
        }
        return response()->json(['message' => 'Notifications sent successfully']);
    }
}
