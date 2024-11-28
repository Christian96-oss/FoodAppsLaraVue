<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::select('id', 'name', 'price', 'image')->get();
        return response(['data' => $items]);
    }
    public function store (Request $request) {
        $request->validate([
            'name' => 'required|max:100',
            'price' => 'required|integer',
            'image_file' => 'nullable|mimes:jpg,png',
        ]);
        if($request->file('image_file')){
            //proses upload
            $file = $request->file('image_file');
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $newName = Carbon::now()->timestamp . '_' . pathinfo($fileName, PATHINFO_FILENAME) . '.' . $extension; // Membuat nama baru dengan ekstensi
            Storage::disk('public')->putFileAs('items', $file, $newName);
            $request['image'] = $newName;
        }
        $item = Item::create($request->all());
        return response(['data' => $item]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'price' => 'required|integer',
            'image_file' => 'nullable|mimes:jpg,png',
        ]);
        if($request->file('image_file')){
            //proses upload
            $file = $request->file('image_file');
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $newName = Carbon::now()->timestamp . '_' . pathinfo($fileName, PATHINFO_FILENAME) . '.' . $extension; // Membuat nama baru dengan ekstensi
            Storage::disk('public')->putFileAs('items', $file, $newName);
            $request['image'] = $newName;
        }
        $item = Item::findOrFail($id);
        $item->update($request->all());
        return response(['date' => $item]);
    }
}
