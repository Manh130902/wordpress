<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class ImageController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }


    public function upload(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,phar|max:2048',
    ]);

    $imagePath = $request->file('image')->store('public/images');

    // Lưu đường dẫn vào cơ sở dữ liệu
    DB::table('images')->insert([
        'name' => $request->file('image')->getClientOriginalName(),
        'path' => $imagePath,
    ]);

    return back()
        ->with('success', 'Ảnh đã được tải lên thành công.')
        ->with('image', $imagePath);
}



public function showImages()
{
    $images = DB::table('images')->get();

    return view('images', compact('images'));
}
}
