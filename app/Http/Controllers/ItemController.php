<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\ItemEditRequest;
use App\Http\Requests\ItemEditImageRequest;
use App\Models\Category;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $recommend_items = Item::where('user_id', '!=', $user->id)->latest()->get();
        return view('items.index', compact('recommend_items'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }


    public function store(ItemRequest $request)
    {
        // dd('test');
        $path = '';
        $image = $request->file('image');
        if (isset($image) === true) {
            $path = $image->store('images', 'public');
        }

        Item::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image' => $path,

        ]);
        $user = Auth::user();
        return redirect()->route('users.exhibitions', $user);
    }

    public function show($id)
    {
        $item = Item::findOrFail($id);
        $category = $item->category;

        return view('items.show', compact('item', 'category'));
    }
    public function detail($id)
    {
        $item = Item::findOrFail($id);
        $category = $item->category;

        return view('items.detail', compact('item', 'category'));
    }



    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $category = $item->category;
        // dd($category);

        return view('items.edit', compact('item', 'category'));
    }

    public function editImage($id)
    {
        $item = Item::findOrFail($id);

        return view('items.editImage', compact('item'));
    }

    public function updateImage(ItemEditImageRequest $request, $id)
    {
        $path = '';
        $image = $request->file('image');
        $item = Item::findOrFail($id);

        if (isset($image) === true) {
            $path = $image->store('images', 'public');
        }

        if ($item->image !== null) {
            Storage::disk('public')->delete($item->image);
        }

        $item->update([
            'image' => $path
        ]);

        return redirect()->route('items.show', $id);
    }

    public function update(ItemEditRequest $request, $id)
    {
        $item = Item::findOrFail($id);

        $item->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('items.show', $id);
    }


    public function destroy($id)
    {
        //
    }

    public function confirm($id)
    {
        $item = Item::findOrFail($id);
        $category = $item->category;

        return view('items.confirm', compact('item', 'category'));
    }
    public function finish($id)
    {
        $item = Item::findOrFail($id);
        $user = Auth::user();
        $category = $item->category;
        Order::create([
            'user_id' => $user->id,
            'item_id' => $item->id
        ]);

        // dd($item);
        $item->delete();

        return view('items.finish', compact('item', 'category'));
    }
}
