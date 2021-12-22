<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public $gallery;

    public function __construct()
    {
        $this->gallery = new Gallery();
    }

    public function index()
    {
        try {
            $data = $this->gallery->all_data_list();

            return view('backend.gallery.index', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function gallery_store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required|min:3|max:32',
                'images*' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            ], [
                'title.required' => 'Title is required.',
                'title.min' => 'Title is getter than 3 words.',
                'title.max' => 'Title is in 32 words.',
                'images*.required' => 'Image is required.',
                'images*.mimes' => 'Please select an image.',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            foreach ($request->images as $key => $image) {
                $photo = $image;
                $photo_name = 'gallery_'.md5(now().$key).'.'.$photo->getClientOriginalExtension();
                $destinationPath = public_path().'/images/gallery';
                try {
                    $photo->move($destinationPath, $photo_name);
                    $data[] = [
                        'uuid' => $this->uuid(),
                        'title' => $request->title,
                        'image' => $photo_name,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                } catch (Exception $e) {
                    return redirect()->back();
                }
            }

            $this->gallery->store_data($data);
            toastr()->success('Images Added Successfully.');

            return redirect()->route('gallery');
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function gallery_image_remove($uuid)
    {
        try {
            $column = 'uuid';
            $column_value = $uuid;
            $find_existing_data = $this->gallery->find_single_data($column, $column_value);

            $image_name = $find_existing_data->image;
            $destinationPath = public_path().'/images/gallery';
            try {
                if (file_exists($destinationPath.'/'.$image_name)) {
                    unlink($destinationPath.'/'.$image_name);
                }
            } catch (Exception $e) {
                return redirect()->back();
            }

            $find_existing_data->forceDelete();
            toastr()->success('Gallery Image Remove Successfully');

            return back();
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }
}
