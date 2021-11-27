<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Review;

class ReviewController extends Controller
{
    public function bookreview($id)
    {
        $data['books'] = Books::where('id',$id)->first();
       return view('reviews.create')->with($data);
    }

    public function store(Request $request,$id)
    {
        $request->validate([
            'review' => ['required']
        ]);
        Review::create([
            'review' => $request->review,
            'book_id' => $id,
            'created_by' => Auth()->user()->id,
            'updated_by' => Auth()->user()->id,
            'status' => 1,
        ]);
        return redirect('getallbooks');
    }
}
