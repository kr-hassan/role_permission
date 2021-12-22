<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\OurTeam;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OurTeamController extends Controller
{
    public $our_team;
    public function __construct()
    {
        $this->our_team = new OurTeam();
    }

    public function index()
    {
        try {
            $data = $this->our_team->all_data_list();
            return view('backend.our_team.index', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function our_team_create()
    {
        try {
            return view('backend.our_team.create');
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function our_team_store(Request $request)
    {
//        ddd($request->all());
        try {
            $validator = Validator::make($request->all(),[
                'name' => 'required|min:3|max:32',
                'designation'  => 'required|min:3|max:32',
                'description'  => 'required|min:3',
                'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
                'fb'  => 'max:191',
                'tw'  => 'max:191',
                'sk'  => 'max:191',
                'ln'  => 'max:191',
                'in'  => 'max:191',
            ], [
                'name.required' => 'Name is required.',
                'name.min' => 'Name min length is 3.',
                'name.max' => 'Name max length is 32.',
                'designation.required' => 'Designation is required.',
                'designation.min' => 'Designation min length is 3.',
                'designation.max' => 'Designation max length is 32.',
                'description.required' => 'Description is required.',
                'description.min' => 'Description min length is 3.',
                'image.required' => 'Image is required.',
                'image.mimes' => 'Please select an image.',
                'fb.max' => 'Facebook link max length is 191.',
                'tw.max' => 'Twitter link max length is 191.',
                'sk.max' => 'Skype link max length is 191.',
                'ln.max' => 'Linkedin link max length is 191.',
                'in.max' => 'Instagram link max length is 191.',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            $photo = $request->file('image');
            $photo_name = 'our_team_' . md5(now()) . '.' . $photo->getClientOriginalExtension();
            $destinationPath = public_path().'/images/our_team' ;
            try {
                $photo->move($destinationPath, $photo_name);
            } catch (Exception $e) {
                return redirect()->back();
            }

            $data = [
                'uuid'      =>$this->uuid(),
                'name'      =>$request->name,
                'designation'      =>$request->designation,
                'description'      =>$request->description,
                'image'      =>$photo_name,
                'fb'      =>$request->fb ?? '',
                'tw'      =>$request->tw ?? '',
                'sk'      =>$request->sk ?? '',
                'ln'      =>$request->ln ?? '',
                'in'      =>$request->in ?? '',
            ];

            $this->our_team->store_data($data);
            toastr()->success('Our Team Added Successfully.');
            return redirect()->route('our_team_list');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }
    }

    public function our_team_view($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $data = $this->our_team->find_single_data($column, $column_value);

            return view('backend.our_team.view', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function our_team_edit($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $data = $this->our_team->find_single_data($column, $column_value);

            return view('backend.our_team.edit', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function our_team_update(Request $request, $id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->our_team->find_single_data($column, $column_value);

            $validator = Validator::make($request->all(),[
                'name' => 'required|min:3|max:32',
                'designation'  => 'required|min:3|max:32',
                'description'  => 'required|min:3',
                'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
                'fb'  => 'max:191',
                'tw'  => 'max:191',
                'sk'  => 'max:191',
                'ln'  => 'max:191',
                'in'  => 'max:191',
            ], [
                'name.required' => 'Name is required.',
                'name.min' => 'Name min length is 3.',
                'name.max' => 'Name max length is 32.',
                'designation.required' => 'Designation is required.',
                'designation.min' => 'Designation min length is 3.',
                'designation.max' => 'Designation max length is 32.',
                'description.required' => 'Description is required.',
                'description.min' => 'Description min length is 3.',
                'image.mimes' => 'Please select an image.',
                'fb.max' => 'Facebook link max length is 191.',
                'tw.max' => 'Twitter link max length is 191.',
                'sk.max' => 'Skype link max length is 191.',
                'ln.max' => 'Linkedin link max length is 191.',
                'in.max' => 'Instagram link max length is 191.',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }
            $old_image_name = $request->old_image;
            $photo = $request->file('image');

            if ($photo !== null) {
                $photo_name = 'our_team_' . md5(now()) . '.' . $photo->getClientOriginalExtension();
                $destinationPath = public_path().'/images/our_team' ;
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
                'uuid'      =>$this->uuid(),
                'name'      =>$request->name,
                'designation'      =>$request->designation,
                'description'      =>$request->description,
                'image'      =>$photo_name,
                'fb'      =>$request->fb ?? '',
                'tw'      =>$request->tw ?? '',
                'sk'      =>$request->sk ?? '',
                'ln'      =>$request->ln ?? '',
                'in'      =>$request->in ?? '',
            ];

            $this->our_team->update_data($update_column, $update_column_value, $update_data);
            toastr()->success('Our Team Update Successfully.');
            return redirect()->route('our_team_list');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }

    }

    public function status_change($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->our_team->find_single_data($column, $column_value);
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

            $this->our_team->update_data($update_column, $update_column_value, $update_data);
            if ($find_existing_data->status === 0){
                toastr()->success('Our Team Active Successfully.');
            } else{
                toastr()->success('Our Team inactive Successfully.');
            }

            return redirect()->route('our_team_list');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }

    }

    public function our_team_remove($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->our_team->find_single_data($column, $column_value);
            $find_existing_data->delete();

            toastr()->success('Our Team Remove Successfully');
            return back();
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }
    }

    public function our_team_trash_list()
    {
        try {
            $data = $this->our_team->trash_data();
            return view('backend.our_team.trash', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function our_team_retrieve($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->our_team->find_single_trash_data($column, $column_value);
            $find_existing_data->restore();

            toastr()->success('Our Team Retrieve Successfully');
            return back();
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }
}
