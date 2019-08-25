<?php

namespace App\Http\Controllers;

use App\ActiviteImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;

class ActiviteImageController extends Controller
{
    public function findByActivite(Request $request)
    {
        if ($request->id) {
            $images = ActiviteImage::all()->where('activite_id', $request->id);
            return $images;
        }
    }

    public function destroy($id)
    {
        $image = ActiviteImage::find($id);
        $image->forceDelete();
        return Response::json(['etat' => true]);
    }

    public function store(Request $request)
    {
        if ($request->hasFile('photo')) {
            $image = new ActiviteImage();
            $filename = Input::file('photo')->hashName();
            Image::make(Input::file('photo', $mode = 0775, $recursive = false, $force = false))->resize(750, 450)->save(storage_path('app\public\activite\\' . $filename));
            $image->image = $filename;
            $image->activite_id=$request->activite_id;
            $image->save();
        }
        return redirect('admin/activites/images');
    }
}
