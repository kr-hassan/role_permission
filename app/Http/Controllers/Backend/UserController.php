<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public $user;
    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        try {
            $data = $this->user->all_data_list();
            return view('backend.user.index', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function user_create()
    {
        try {
            return view('backend.user.create');
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function user_store(Request $request)
    {
//        dd($request->all());
        try {
            $validator = Validator::make($request->all(),[
                'name' => 'required|string|min:3|max:64',
                'phone'  => 'required',
                'email'  => 'required',
            ], [
                'name.required' => 'Name is required.',
                'name.min' => 'Name min length is 3.',
                'name.max' => 'Name max length is 64.',
                'phone.required' => 'Phone is required.',
                'phone.unique' => 'Phone is Unique.',
                'phone.min' => 'Phone min length is 3.',
                'phone.max' => 'Phone max length is 64.',
                'email.required' => 'Email is required.',
                'email.email' => 'Email is not valid.',
                'email.unique' => 'Phone is Unique.',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }
            $data = [
                'uuid'      =>$this->uuid(),
                'name'      =>$request->name,
                'email'      =>$request->email,
                'phone'      =>$request->phone,
                'password'      =>Hash::make($request->phone),
            ];

            $this->user->store_data($data);
            toastr()->success('User Added Successfully.');
            return redirect()->route('user');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }
    }

    public function user_edit($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $data = $this->user->find_single_data($column, $column_value);

            return view('backend.user.edit', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function user_update(Request $request, $id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->user->find_single_data($column, $column_value);
            $validator = Validator::make($request->all(),[
                'name' => 'required|string|min:3|max:64',
                'phone'  => 'required | min:10 | max:32 | unique:users,phone,'. $find_existing_data->id,
                'email'  => 'required | email | unique:users,email,'. $find_existing_data->id,
            ], [
                'name.required' => 'Name is required.',
                'name.min' => 'Name min length is 3.',
                'name.max' => 'Name max length is 64.',
                'phone.required' => 'Phone is required.',
                'email.required' => 'Email is required.',
                'email.email' => 'Email is not valid.',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            $update_column = "id";
            $update_column_value = $find_existing_data->id;
            $update_data = [
                'name'      =>$request->name,
                'email'      =>$request->email,
                'phone'      =>$request->phone,
            ];

            $this->user->update_data($update_column, $update_column_value, $update_data);
            toastr()->success('User Update Successfully.');
            return redirect()->route('user');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }

    }

    public function status_change($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->user->find_single_data($column, $column_value);
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

            $this->user->update_data($update_column, $update_column_value, $update_data);
            if ($find_existing_data->status === 0){
                toastr()->success('User Active Successfully.');
            } else{
                toastr()->success('User inactive Successfully.');
            }

            return redirect()->route('user');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }

    }

    public function user_remove($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->user->find_single_data($column, $column_value);
            $find_existing_data->delete();

            toastr()->success('User Remove Successfully');
            return back();
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }
    }

    public function user_trash_list()
    {
        try {
            $data = $this->user->trash_data();
            return view('backend.user.trash', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function user_retrieve($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->user->find_single_trash_data($column, $column_value);
            $find_existing_data->restore();

            toastr()->success('User Retrieve Successfully');
            return back();
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function password_reset($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->user->find_single_trash_data($column, $column_value);
            if ($find_existing_data->phone){
                $update_column = "id";
                $update_column_value = $find_existing_data->id;
                $update_data = [
                    'password'      =>Hash::make($find_existing_data->phone),
                ];
                $this->user->update_data($update_column, $update_column_value, $update_data);
                toastr()->success('User Password Reset Successfully.');
                return redirect()->route('user');
            }
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }
}
