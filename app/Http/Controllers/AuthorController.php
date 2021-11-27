<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Authors;

class AuthorController extends Controller
{
    public function getAuthor()
    {
        $authors = Authors::get()->toArray();
        return view('authors.authors')->with(['authors'=>$authors]);
    }

    public function createAuthor()
    {
       return view('authors.createauthor');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255','unique:authors']
        ]);
        $authors = Authors::create([
            'name' => $request->name,
            'created_by' => Auth()->user()->id,
            'updated_by' => Auth()->user()->id,
        ]);

        return redirect('authors');
    }

    public function editAuthor(Request $request,$id)
    {
        $authors = Authors::where('id',$id)->get()->toArray();
        return view('authors.updateauthor')->with('author',$authors);
    }

    public function updateAuthor(Request $request,$id)
    {
        $authors = Authors::find($id)->update([
            'name'=> $request->name,
            'updated_by' => Auth()->user()->id,
        ]);
        return redirect('authors');
    }

    public function deleteAuthor(Request $request,$id)
    {
        $deleteAuthor = Authors::find($id)->delete();
        return redirect('authors');
    }
}
