<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectDetails;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public $project, $project_details;
    public function __construct()
    {
        $this->project = new Project();
        $this->project_details = new ProjectDetails();
    }

    public function index()
    {
        try {
            $data = $this->project->all_data_list();
            return view('backend.project.index', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function project_create()
    {
        try {
            return view('backend.project.create');
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function project_store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'title' => 'required|min:3|max:32',
                'type'  => 'required',
                'description'  => 'required|min:3',
                'images*' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            ], [
                'title.required' => 'Caption is required.',
                'title.min' => 'Caption min length is 3.',
                'title.max' => 'Caption max length is 32.',
                'type.required' => 'Title is required.',
                'description.required' => 'Button Text is required.',
                'description.min' => 'Button Text min length is 3.',
                'image*.required' => 'Image is required.',
                'image*.mimes' => 'Please select an image.',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            $data = [
                'uuid'      =>$this->uuid(),
                'title'      =>$request->title,
                'type'      =>$request->type,
                'description'      =>$request->description,
            ];

            $project = $this->project->store_data($data);

            if ($request->images){

                foreach ($request->images as $key=>$image){
                    $photo = $image;
                    $photo_name = 'projects_' . md5(now().$key) . '.' . $photo->getClientOriginalExtension();
                    $destinationPath = public_path().'/images/projects' ;
                    try {
                        $photo->move($destinationPath, $photo_name);
                        $data_details[] = [
                            'uuid'      =>$this->uuid(),
                            'project_id'     => $project->id,
                            'image'      =>$photo_name,
                            'feature_image'     =>$key == 0 ? '1' : null,
                            'created_at'      =>now(),
                            'updated_at'      =>now(),
                        ];
                    } catch (Exception $e) {
                        return redirect()->back();
                    }
                }
                $this->project_details->store_data($data_details);
            }

            toastr()->success('Project Added Successfully.');
            return redirect()->route('project_list');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }
    }

    public function project_view($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $data = $this->project->find_single_data($column, $column_value);

            return view('backend.project.view', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function project_edit($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $data = $this->project->find_single_data($column, $column_value);

            return view('backend.project.edit', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function project_update(Request $request, $id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->project->find_single_data($column, $column_value);
            $validator = Validator::make($request->all(),[
                'title' => 'required|min:3|max:32',
                'type'  => 'required',
                'description'  => 'required|min:3'
            ], [
                'title.required' => 'Title is required.',
                'title.min' => 'Title min length is 3.',
                'title.max' => 'Title max length is 32.',
                'type.required' => 'Type is required.',
                'description.required' => 'Button Text is required.',
                'description.min' => 'Button Text min length is 3.'
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            $update_column = "id";
            $update_column_value = $find_existing_data->id;
            $update_data = [
                'title'      =>$request->title,
                'type'      =>$request->type,
                'description'      =>$request->description,
            ];

            $this->project->update_data($update_column, $update_column_value, $update_data);
            toastr()->success('Project Update Successfully.');
            return redirect()->route('project_list');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }

    }

    public function status_change($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->project->find_single_data($column, $column_value);
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

            $this->project->update_data($update_column, $update_column_value, $update_data);
            if ($find_existing_data->status === 0){
                toastr()->success('Project Active Successfully.');
            } else{
                toastr()->success('Project inactive Successfully.');
            }

            return redirect()->route('project_list');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }

    }

    public function project_remove($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->project->find_single_data($column, $column_value);
            $find_existing_data->delete();

            toastr()->success('Project Remove Successfully');
            return back();
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }
    }

    public function project_trash_list()
    {
        try {
            $data = $this->project->trash_data();
            return view('backend.project.trash', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function project_retrieve($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->project->find_single_trash_data($column, $column_value);
            $find_existing_data->restore();

            toastr()->success('Project Retrieve Successfully');
            return back();
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function project_feature_image_change($uuid)
    {
        $update_column = "uuid";
        $update_column_value = $uuid;
        $update_new_data = [
            'feature_image'      =>'1'
        ];
        $update_all_data = [
            'feature_image'      => null
        ];

        $this->project_details->set_feature_image($update_column, $update_column_value, $update_new_data);
        $this->project_details->remove_feature_image($update_column, $update_column_value, $update_all_data);
        $details_data = $this->project_details->find_single_data($update_column, $update_column_value);
        $column = "id";
        $column_value = $details_data->project_id;
        $data = $this->project->find_single_data($column, $column_value);

        toastr()->success('Project Feature Image Set Successfully');
        return view('backend.project.view', compact('data'));
    }

    public function project_image_remove($uuid)
    {
        try {
            $column = "uuid";
            $column_value = $uuid;
            $find_existing_data = $this->project_details->find_single_data($column, $column_value);

            if ($find_existing_data->image !== null) {
                $photo_name = $find_existing_data->image;
                $destinationPath = public_path().'/images/projects' ;
                try {
                    if(file_exists($destinationPath.'/'.$photo_name)){
                        unlink($destinationPath.'/'.$photo_name);
                    }
                } catch (Exception $e) {
                    return redirect()->back();
                }
            }

            $find_existing_data->delete();

            if ($find_existing_data->feature_image == 1){
                $project_single_details = $this->project_details->find_first_data();
                $update_column = "uuid";
                $update_column_value = $project_single_details->uuid;
                $update_new_data = [
                    'feature_image'      =>'1'
                ];
                $update_all_data = [
                    'feature_image'      => null
                ];

                $this->project_details->set_feature_image($update_column, $update_column_value, $update_new_data);
                $this->project_details->remove_feature_image($update_column, $update_column_value, $update_all_data);
            }

            toastr()->success('Project Image Deleted Successfully');
            return back();
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }
    }

    public function project_image_add($uuid)
    {
        try {
            $column = "uuid";
            $column_value = $uuid;
            $data = $this->project->find_single_data($column, $column_value);
            return view('backend.project.add_image', compact('data'));
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function project_image_store(Request $request, $uuid)
    {
        try {
            $validator = Validator::make($request->all(),[
                'images*' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            ], [
                'image*.required' => 'Image is required.',
                'image*.mimes' => 'Please select an image.',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            $column = "uuid";
            $column_value = $uuid;
            $project = $this->project->find_single_data($column, $column_value);

            if ($request->images){

                foreach ($request->images as $key=>$image){
                    $photo = $image;
                    $photo_name = 'projects_' . md5(now().$key) . '.' . $photo->getClientOriginalExtension();
                    $destinationPath = public_path().'/images/projects' ;
                    try {
                        $photo->move($destinationPath, $photo_name);
                        $data_details[] = [
                            'uuid'      =>$this->uuid(),
                            'project_id'     => $project->id,
                            'image'      =>$photo_name,
                            'feature_image'     => null,
                            'created_at'      =>now(),
                            'updated_at'      =>now(),
                        ];
                    } catch (Exception $e) {
                        return redirect()->back();
                    }
                }
                $this->project_details->store_data($data_details);
            }

            toastr()->success('Project Image Added Successfully.');
            return redirect()->route('project_list');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }
    }
}
