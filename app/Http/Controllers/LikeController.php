<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function index()
    {
        $like_items = Auth::user()->likeItems()->latest()->get();
        return view('likes.index', compact('like_items'));
    }



    public function toggleLike($id)
    {
        $user = Auth::user();
        $item = Item::find($id);

        if ($item->isLikedBy($user)) {
            $item->likes->where('user_id', $user->id)->first()->delete();
        } else {
            Like::create([
                'user_id' => $user->id,
                'item_id' => $item->id,
            ]);
        }
        return redirect()->route('items.index');
    }
}
