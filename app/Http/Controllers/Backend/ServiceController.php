<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public $service;
    public function __construct()
    {
        $this->service = new Service();
    }

    public function index()
    {
        try {
            $data = $this->service->all_data_list();
            return view('backend.service.index', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function service_create()
    {
        try {
            return view('backend.service.create');
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function service_store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'title_first' => 'required|min:3|max:15',
                'title_last'  => 'required|min:3|max:15',
                'description'  => 'required|min:3',
                'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
                'priority'  => 'integer|unique:services',
            ], [
                'title_first.required' => 'Caption is required.',
                'title_first.min' => 'Caption min length is 3.',
                'title_first.max' => 'Caption max length is 32.',
                'title_last.required' => 'Title is required.',
                'title_last.min' => 'Title min length is 3.',
                'title_last.max' => 'Title max length is 32.',
                'description.required' => 'Button Text is required.',
                'description.min' => 'Button Text min length is 3.',
                'image.required' => 'Image is required.',
                'image.mimes' => 'Please select an image.',
                'priority.unique' => 'Priority Must Be Unique.',
                'priority.integer' => 'Priority Must Be Integer.',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            $photo = $request->file('image');
            $photo_name = 'service_' . md5(now()) . '.' . $photo->getClientOriginalExtension();
            $destinationPath = public_path().'/images/service' ;
            try {
                $photo->move($destinationPath, $photo_name);
            } catch (Exception $e) {
                return redirect()->back();
            }

            $data = [
                'uuid'      =>$this->uuid(),
                'title_first'      =>$request->title_first,
                'title_last'      =>$request->title_last,
                'description'      =>$request->description,
                'image'      =>$photo_name,
                'priority'      =>$request->priority ?? null,
            ];

            $this->service->store_data($data);
            toastr()->success('Service Added Successfully.');
            return redirect()->route('service_list');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }
    }

    public function service_view($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $data = $this->service->find_single_data($column, $column_value);

            return view('backend.service.view', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function service_edit($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $data = $this->service->find_single_data($column, $column_value);

            return view('backend.service.edit', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function service_update(Request $request, $id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->service->find_single_data($column, $column_value);
            $validator = Validator::make($request->all(),[
                'title_first' => 'required|min:3|max:15',
                'title_last'  => 'required|min:3|max:15',
                'description'  => 'required|min:3',
                'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
                'priority'  => 'integer|unique:services,priority,'. $find_existing_data->id,
            ], [
                'title_first.required' => 'Caption is required.',
                'title_first.min' => 'Caption min length is 3.',
                'title_first.max' => 'Caption max length is 32.',
                'title_last.required' => 'Title is required.',
                'title_last.min' => 'Title min length is 3.',
                'title_last.max' => 'Title max length is 32.',
                'description.required' => 'Button Text is required.',
                'description.min' => 'Button Text min length is 3.',
                'image.required' => 'Image is required.',
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
                $photo_name = 'service_' . md5(now()) . '.' . $photo->getClientOriginalExtension();
                $destinationPath = public_path().'/images/service' ;
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
                'title_first'      =>$request->title_first,
                'title_last'      =>$request->title_last,
                'description'      =>$request->description,
                'priority'      =>$request->priority,
                'image'      =>$photo_name,
            ];

            $this->service->update_data($update_column, $update_column_value, $update_data);
            toastr()->success('Service Update Successfully.');
            return redirect()->route('service_list');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }

    }

    public function status_change($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->service->find_single_data($column, $column_value);
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

            $this->service->update_data($update_column, $update_column_value, $update_data);
            if ($find_existing_data->status === 0){
                toastr()->success('Service Active Successfully.');
            } else{
                toastr()->success('Service inactive Successfully.');
            }

            return redirect()->route('service_list');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }

    }

    public function service_remove($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->service->find_single_data($column, $column_value);
            $find_existing_data->delete();

            toastr()->success('Service Remove Successfully');
            return back();
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }
    }

    public function service_trash_list()
    {
        try {
            $data = $this->service->trash_data();
            return view('backend.service.trash', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function service_retrieve($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->service->find_single_trash_data($column, $column_value);
            $find_existing_data->restore();

            toastr()->success('Service Retrieve Successfully');
            return back();
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }
}
