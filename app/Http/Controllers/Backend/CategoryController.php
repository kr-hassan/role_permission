<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public $category;
    public function __construct()
    {
        $this->category = new Category();
    }

    public function index()
    {
        try {
            $data = $this->category->all_data_list();
            return view('backend.category.index', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function category_create()
    {
        try {
            $category_data = $this->category->all_data_list_dropdown();
            return view('backend.category.create', compact('category_data'));
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function category_store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'name' => 'required|string|min:3|max:64',
            ], [
                'name.required' => 'Name is required.',
                'name.min' => 'Name min length is 3.',
                'name.max' => 'Name max length is 64.',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            $data = [
                'uuid'      =>$this->uuid(),
                'name'      =>$request->name,
                'parent_id'      =>$request->parent_id,
            ];

            $this->category->store_data($data);
            toastr()->success('Category Added Successfully.');
            return redirect()->route('category');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }
    }

    public function category_edit($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $data = $this->category->find_single_data($column, $column_value);
            $category_data = $this->category->all_data_list_dropdown();

            return view('backend.category.edit', compact('data', 'category_data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function category_update(Request $request, $id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->category->find_single_data($column, $column_value);
            $validator = Validator::make($request->all(),[
                'name' => 'required|string|min:3|max:64',
            ], [
                'name.required' => 'Name is required.',
                'name.min' => 'Name min length is 3.',
                'name.max' => 'Name max length is 64.',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            $update_column = "id";
            $update_column_value = $find_existing_data->id;
            $update_data = [
                'name'      =>$request->name,
                'parent_id'      =>$request->parent_id,
            ];

            $this->category->update_data($update_column, $update_column_value, $update_data);
            toastr()->success('Category Update Successfully.');
            return redirect()->route('category');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }

    }

    public function status_change($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->category->find_single_data($column, $column_value);
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

            $this->category->update_data($update_column, $update_column_value, $update_data);
            if ($find_existing_data->status === 0){
                toastr()->success('Category Active Successfully.');
            } else{
                toastr()->success('Category inactive Successfully.');
            }

            return redirect()->route('category');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }

    }

    public function category_remove($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->category->find_single_data($column, $column_value);
            $find_existing_data->delete();

            toastr()->success('Category Remove Successfully');
            return back();
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }
    }

    public function category_trash_list()
    {
        try {
            $data = $this->category->trash_data();
            return view('backend.category.trash', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function category_retrieve($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->category->find_single_trash_data($column, $column_value);
            $find_existing_data->restore();

            toastr()->success('Category Retrieve Successfully');
            return back();
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }
}
