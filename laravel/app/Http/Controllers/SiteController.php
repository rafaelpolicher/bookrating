<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        $books = Book::all();
        return view('site/home',compact('books'));
    }

    public function details($slug){
        $book = Book::where('slug', $slug)->first();
        return view('site.details', compact('book'));
    }

}
