<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class TestController extends Controller
{
    public function upload(UploadRequest $request){
        if ($request->image){
            $filename = sprintf('image_%s.%s', Str::random(3), $request->image->getClientOriginalExtension());
            //Save image original
            Storage::disk('public')->putFileAs('', $request->image, $filename);

            //Compress image
            $img = Image::make($request->image);
            $disk = Storage::disk('public')->path('');
            $filename = sprintf('compress.%s', $request->image->getClientOriginalExtension());
            $img->save($disk.$filename);
        }

        return view('test')->with(['success' => 'Image upload!']);
    }

    public function show(){
        return view('test');
    }
}
