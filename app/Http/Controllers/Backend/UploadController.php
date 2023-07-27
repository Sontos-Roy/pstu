<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;     
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        if ($request->hasFile('upload')) {

            if ($request->hasFile('upload')) {
                $originName = $request->file('upload')->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $request->file('upload')->getClientOriginalExtension();
                $fileName = $fileName . '_' . time() . '.' . $extension;

                $request->file('upload')->move(public_path('media'), $fileName);

                $url = asset('media/' . $fileName);

                return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
            }

        }
    }
}
