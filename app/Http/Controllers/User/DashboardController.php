<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
class DashboardController extends Controller
{
    public function index(){
        $books = Book::with('authors', 'category')
        ->paginate(5);
        return view('dashboard', compact('books'));
    }
}
