<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use App\Models\Order;
use App\Http\Requests\ProfileImageRequest;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{


    public function  usersExhibitions($user)
    {
        $userItems = Item::where('user_id', $user)->latest()->get();

        return view('users.exhibitions', compact('userItems'));
    }

    public function show(User $user)
    {

        $user = User::findOrFail($user->id);
        $itemCount = $user->items()->count();
        $purchaseHistory = Order::where('user_id', $user->id)
            ->with('user', 'item')
            ->latest()
            ->get();
        // dd($purchaseHistory);
        return view('users.show', compact('user', 'itemCount', 'purchaseHistory'));
    }
    public function edit()
    {
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

    public function editImage()
    {
        $user = Auth::user();
        return view('users.editImage', compact('user'));
    }

    public function update(ProfileRequest $request, User $user)
    {

        $user->update([
            'name' => $request->name,
            'profile' => $request->profile
        ]);

        return redirect()->route('users.show', $user);
    }
    public function updateImage(ProfileImageRequest $request, User $user)
    {
        $path = '';
        $image = $request->file('image');

        if (isset($image) === true) {
            $path = $image->store('images', 'public');
        }

        if ($user->image !== null) {
            Storage::disk('public')->delete($user->image);
        }

        $user->update([
            'image' => $path
        ]);
        return redirect()->route('users.show', $user);
    }
}
