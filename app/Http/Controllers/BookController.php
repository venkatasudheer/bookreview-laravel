<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Authors;
use App\Models\Review;
use App\Models\Booksauthor;

class BookController extends Controller
{
    public function getAllBooks()
   {
       $books['books'] = Books::where('status',1)->get();
       return view('books.index',$books);
   }

   public function BooksReview($id)
   {   $books['books'] = Books::where('id',$id)->first();
       $books['review'] = Review::where('book_id',$id)->get();
       return view('books.view',$books);
   }

   public function createBook()
    {
       $books['author'] = Authors::get();
       return view('books.createbook')->with($books);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255','unique:books'],
            'authorname' => ['required']
        ]);
        $authorId = $request->authorname;
        $booksId = Books::create([
            'name' => $request->name,
            'created_by' => Auth()->user()->id,
            'updated_by' => Auth()->user()->id,
            'status' => 1,
        ])->id;
        foreach ($authorId as $key => $value) {
            $data['authors_id'] = $value;
            $data['books_id'] = $booksId;
            Booksauthor::insert($data);
        }
        return redirect('getallbooks');
    }

    public function updateStore(Request $request,$id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'authorname' => ['required']
        ]);
        $authorId = $request->authorname;
        Books::find($id)->update([
            'name' => $request->name,
            'updated_by' => Auth()->user()->id,
            'status' => 1,
        ]);
        Books::find($id)->authors()->detach();
        foreach ($authorId as $key => $value) {
                $data['authors_id'] = $value;
                $data['books_id'] = $id;
                Booksauthor::insert($data);
       }
        return redirect('getallbooks');
    }

   public function getBookById($id)
   {
       $books = Books::find($id);
       $data['books'] = $books->where('id',$id)->first();
       $data['authors'] = Authors::get();
       $data['selectedauthors'] = $books->authors()->pluck('authors_id')->all();
       return view('books.updatebook')->with($data);
   }

   public function deleteBook(Request $request,$id)
    {
        $book = Books::find($id)->update(['status'=> 0]);
        return redirect('getallbooks');
    }
}