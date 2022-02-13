<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'Admin') {
            return view('gallery.index', ['gallery' => Gallery::all(), 'thumbPath' => STORAGE::path('images\thumbs/')]);
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role == 'Admin') {
            return view('gallery.add');
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->role == 'Admin') {

            $validatedData = $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg|max:15000',
                'title' => 'required|max:100',
                'img_desc' => 'required|max:255',
                'img_desc_en' => 'required|max:255',
                'title_en' => 'required|max:100',
                'active' => 'required'
            ]);
            $thumbPath = STORAGE::path('images/thumbs');
            $imagePath = STORAGE::path('images/gallery');
            $file = $request->file('image');
            $count = Gallery::count();
            $order = $count + 1;
            $imageName = 'image' . $order;
            $thumbName = 'thumb' . $order;
            $img = Image::make($file)
                ->encode('jpg', 50);;
            $thumb = Image::make($file)
                ->encode('jpg', 50);;
            $thumb->save($thumbPath . '/' . $thumbName . '.jpg', 15);
            $img->save($imagePath . '/' . $imageName . '.jpg', 60);

            $gallery = Gallery::make($validatedData);
            $gallery->order = (Gallery::count() + 1);
            $gallery->save();

            session()->flash('status', 'Slika dodana.');
            return redirect()->route('gallery.index');
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }



    public function edit($id)
    {
        if (Auth::user()->role == 'Admin') {

            return view('gallery.edit', ['gallery' => Gallery::FindOrFail($id)]);
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->role == 'Admin') {

            $validatedData = $request->validate([
                'title' => 'required|max:100',
                'title_en' => 'required|max:100',
                'img_desc' => 'required|max:255',
                'img_desc_en' => 'required|max:255',
                'active' => 'required'
            ]);
            $gallery = Gallery::findOrFail($id);
            $gallery->fill($validatedData);
            $gallery->save();

            session()->flash('status', 'Slika promijenjena.');
            return redirect()->route('gallery.index');
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->role == 'Admin') {

            $image = Gallery::findOrFail($id);
            Storage::delete('/images/thumbs/thumb' . $image['order'] . '.jpg');
            Storage::delete('/images/gallery/image' . $image['order'] . '.jpg');

            $image->delete();

            session()->flash('status', 'Slika uspješno izbrisana');

            return redirect()->route('gallery.index');
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }
}
