<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{

    public function index(){    
        $genres = ["Acadêmico", "Aventura", "Biografia", "Clássico", "Drama", "Ficção", "HQ", "Infantil", "Não-Ficçao", "Novela", "Religioso", "Romance", "Terror"];
        if(!auth()->check() || auth()->user()->role === 'user'){
            return redirect()->back()->with('error', 'Você não tem autorização para acessar esta página');
        }else{
            return view('site/addBook',compact('genres'));
        }
        
}

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'author' => 'required',
        'genre' => 'required',
        'editor_rating' => 'required',
        'review' => 'required',
    ], [
        'title.required' => 'O campo título é obrigatório',
        'author.required' => 'O campo Autor é obrigatório',
        'genre.required' => 'O campo Gênero é obrigatório',
        'review.required' => 'O campo Review é obrigatório',
        'editor_rating.required' => 'O campo Nota é obrigatório',
    ]);
    $user_id = auth()->id();
    
    $book = new Book;
    $book->title = $request->input('title');
    $book->author = $request->input('author');
    $book->genre = $request->input('genre');
    $book->review = $request->input('review');
    $book->editor_rating = $request->input('editor_rating');
    $book->id_user = $user_id;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = $image->store('public/images/book', 'public');
        $book->image = $imagePath;
    }

    $book->slug = Str::slug($book->title);
    $book->save();

    return redirect()->route('site.details', ['slug' => $book->slug])->with('success', 'Livro adicionado com sucesso!');
}

    public function update(Request $request, $slug)
{
    $book = Book::where('slug', $slug)->firstOrFail();
    
    $book->title = $request->input('title');
    $book->author = $request->input('author');
    $book->editor_rating = $request->input('editor_rating');
    $book->review = $request->input('review');
    
    
    $book->save();
    
    return redirect()->back()->with('success', 'Livro atualizado com sucesso.');
}

    public function delete($slug)
{
    $book = Book::where('slug', $slug)->firstOrFail();
    $book->delete();

    return redirect()->route('site.home')->with('success', 'Livro deletado com sucesso!');
}

    public function show($genre){
        $books = Book::where('genre', $genre)->get();
    return view('site.genre', compact('books'));
    }

    public function allBooks()
    {
        $books = Book::paginate(50); 
        return view('site.allBooks',compact('books'));
    }
    


}


