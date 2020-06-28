<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Image;

class ImageController extends Controller
{
    public function destroy($id)
    {
        // echo var_dump($id);
        $image = Image::findOrFail($id);
        $image->delete();
    }
}
