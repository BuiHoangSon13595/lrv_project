<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Comment;
use Illuminate\Http\Request;

class RatingCommentController extends Controller
{
    public function addRating(Request $request)
    {
        Rating::add();
        return redirect()->back()->with('success','Thành Công!');
    }
    public function addComment(Request $request)
    {
        Comment::add();
        return redirect()->back()->with('success','Thành Công!');
    }

}
