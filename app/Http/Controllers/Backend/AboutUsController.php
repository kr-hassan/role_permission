<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutUsController extends Controller
{
    public $about_us;
    public function __construct()
    {
        $this->about_us = new AboutUs();
    }

    public function index()
    {
        try {
            $data = $this->about_us->all_data_list();
            return view('backend.about_us.index', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function about_us_create()
    {
        try {
            return view('backend.about_us.create');
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function about_us_store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'title' => 'required|min:3|max:64',
                'description'  => 'required|min:3',
                'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            ], [
                'title.required' => 'Title is required.',
                'title.min' => 'Title min length is 3.',
                'title.max' => 'Title max length is 64.',
                'description.required' => 'Button Text is required.',
                'description.min' => 'Button Text min length is 3.',
                'image.required' => 'Image is required.',
                'image.mimes' => 'Please select an image.',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            $photo = $request->file('image');
            $photo_name = 'about_us_' . md5(now()) . '.' . $photo->getClientOriginalExtension();
            $destinationPath = public_path().'/images/about_us' ;
            try {
                $photo->move($destinationPath, $photo_name);
            } catch (Exception $e) {
                return redirect()->back();
            }

            $data = [
                'uuid'      =>$this->uuid(),
                'title'      =>$request->title,
                'description'      =>$request->description,
                'image'      =>$photo_name,
            ];

            $this->about_us->store_data($data);
            toastr()->success('About Us Added Successfully.');
            return redirect()->route('about_us_list');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }
    }

    public function about_us_edit($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $data = $this->about_us->find_single_data($column, $column_value);

            return view('backend.about_us.edit', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function about_us_update(Request $request, $id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->about_us->find_single_data($column, $column_value);
            $validator = Validator::make($request->all(),[
                'title' => 'required|min:3|max:64',
                'description'  => 'required|min:3',
                'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            ], [
                'title.required' => 'Title is required.',
                'title.min' => 'Title min length is 3.',
                'title.max' => 'Title max length is 64.',
                'description.required' => 'Button Text is required.',
                'description.min' => 'Button Text min length is 3.',
                'image.required' => 'Image is required.',
                'image.mimes' => 'Please select an image.',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }
            $old_image_name = $request->old_image;
            $photo = $request->file('image');

            if ($photo !== null) {
                $photo_name = 'about_us_' . md5(now()) . '.' . $photo->getClientOriginalExtension();
                $destinationPath = public_path().'/images/about_us' ;
                try {
                    $photo->move($destinationPath, $photo_name);
                    if(file_exists($destinationPath.'/'.$old_image_name)){
                        unlink($destinationPath.'/'.$old_image_name);
                    }
                } catch (Exception $e) {
                    return redirect()->back();
                }

            } else {
                $photo_name = $request->old_image;
            }

            $update_column = "id";
            $update_column_value = $find_existing_data->id;
            $update_data = [
                'title'      =>$request->title,
                'description'      =>$request->description,
                'image'      =>$photo_name,
            ];

            $this->about_us->update_data($update_column, $update_column_value, $update_data);
            toastr()->success('About Us Update Successfully.');
            return redirect()->route('about_us_list');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }

    }
}
