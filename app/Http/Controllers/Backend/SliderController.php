<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    public $slider;
    public function __construct()
    {
        $this->slider = new Slider();
    }

    public function index()
    {
        try {
            $data = $this->slider->all_data_list();
            return view('backend.slider.index', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function slider_create()
    {
        try {
            return view('backend.slider.create');
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function slider_store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'caption' => 'required|min:3|max:32',
                'title'  => 'required|min:3|max:32',
                'button_text'  => 'required|min:3|max:32',
                'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
                'priority'  => 'integer|unique:sliders',
            ], [
                'caption.required' => 'Caption is required.',
                'caption.min' => 'Caption min length is 3.',
                'caption.max' => 'Caption max length is 32.',
                'title.required' => 'Title is required.',
                'title.min' => 'Title min length is 3.',
                'title.max' => 'Title max length is 32.',
                'button_text.required' => 'Button Text is required.',
                'button_text.min' => 'Button Text min length is 3.',
                'button_text.max' => 'Button Text max length is 32.',
                'image.required' => 'Image is required.',
                'image.mimes' => 'Please select an image.',
                'priority.unique' => 'Priority Must Be Unique.',
                'priority.integer' => 'Priority Must Be Integer.',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            $photo = $request->file('image');
            $photo_name = 'slider_' . md5(now()) . '.' . $photo->getClientOriginalExtension();
            $destinationPath = public_path().'/images/slider' ;
            try {
                $photo->move($destinationPath, $photo_name);
            } catch (Exception $e) {
                return redirect()->back();
            }

            $data = [
                'uuid'      =>$this->uuid(),
                'caption'      =>$request->caption,
                'title'      =>$request->title,
                'button_text'      =>$request->button_text,
                'image'      =>$photo_name,
                'priority'      =>$request->priority ?? null,
            ];

            $this->slider->store_data($data);
            toastr()->success('Slider Added Successfully.');
            return redirect()->route('slider');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }
    }

    public function slider_edit($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $data = $this->slider->find_single_data($column, $column_value);

            return view('backend.slider.edit', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function slider_update(Request $request, $id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->slider->find_single_data($column, $column_value);
            $validator = Validator::make($request->all(),[
                'caption' => 'required|min:3|max:32',
                'title'  => 'required|min:3|max:32',
                'button_text'  => 'required|min:3|max:32',
                'image'  => 'mimes:jpeg,jpg,png,gif|max:10000',
                'priority'  => 'integer|unique:sliders,priority,'. $find_existing_data->id,
            ], [
                'caption.required' => 'Caption is required.',
                'caption.min' => 'Caption min length is 3.',
                'caption.max' => 'Caption max length is 32.',
                'title.required' => 'Title is required.',
                'title.min' => 'Title min length is 3.',
                'title.max' => 'Title max length is 32.',
                'button_text.required' => 'Button Text is required.',
                'button_text.min' => 'Button Text min length is 3.',
                'button_text.max' => 'Button Text max length is 32.',
                'image.mimes' => 'Please select an image.',
                'priority.unique' => 'Priority Must Be Unique.',
                'priority.integer' => 'Priority Must Be Integer.',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }
            $old_image_name = $request->old_image;
            $photo = $request->file('image');

            if ($photo !== null) {
                $photo_name = 'slider_' . md5(now()) . '.' . $photo->getClientOriginalExtension();
                $destinationPath = public_path().'/images/slider' ;
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
                'caption'      =>$request->caption,
                'title'      =>$request->title,
                'button_text'      =>$request->button_text,
                'priority'      =>$request->priority,
                'image'      =>$photo_name,
            ];

            $this->slider->update_data($update_column, $update_column_value, $update_data);
            toastr()->success('Slider Update Successfully.');
            return redirect()->route('slider');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }

    }

    public function status_change($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->slider->find_single_data($column, $column_value);
            if ($find_existing_data->status === 0){
                $status = 1;
            } else{
                $status = 0;
            }
            $update_column = "id";
            $update_column_value = $find_existing_data->id;
            $update_data = [
                'status'      =>$status
            ];

            $this->slider->update_data($update_column, $update_column_value, $update_data);
            if ($find_existing_data->status === 0){
                toastr()->success('Slider Active Successfully.');
            } else{
                toastr()->success('Slider inactive Successfully.');
            }

            return redirect()->route('slider');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }

    }

    public function slider_remove($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->slider->find_single_data($column, $column_value);
            $find_existing_data->delete();

            toastr()->success('Slider Remove Successfully');
            return back();
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }
    }

    public function slider_trash_list()
    {
        try {
            $data = $this->slider->trash_data();
            return view('backend.slider.trash', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function slider_retrieve($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->slider->find_single_trash_data($column, $column_value);
            $find_existing_data->restore();

            toastr()->success('Slider Retrieve Successfully');
            return back();
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }
}
