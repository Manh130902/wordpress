<?php

namespace App\Http\Controllers;

use App\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileUploadController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $fileName = $file->getClientOriginalName();

            $file->storeAs('public/uploads/', $fileName);

            // Lưu thông tin tệp vào cơ sở dữ liệu
            DB::table('images')->insert([
                'name' => $file->getClientOriginalName(),
                'path' => 'public/storage/uploads/' . $fileName,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return back()->with('success', 'File uploaded successfully. path: /storage/uploads/' . $fileName);
        }

        return back()->with('error', 'No file uploaded.');
    }

   
}
