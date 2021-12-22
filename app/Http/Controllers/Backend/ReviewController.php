<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public $review;
    public function __construct()
    {
        $this->review = new Review();
    }

    public function index()
    {
        try {
            $data = $this->review->all_data_list();
            return view('backend.review.index', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function review_create()
    {
        try {
            return view('backend.review.create');
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function review_store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'name' => 'required|min:3|max:32',
                'comment' => 'required|min:10',
            ], [
                'name.required' => 'Name is required.',
                'name.min' => 'Name min length is 3.',
                'name.max' => 'Name max length is 32.',
                'comment.required' => 'Name is required.',
                'comment.min' => 'Name min length is 10.',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            $data = [
                'uuid'      =>$this->uuid(),
                'name'      =>$request->name,
                'comment'      =>$request->comment,
            ];

            $this->review->store_data($data);
            toastr()->success('Review Added Successfully.');
            return redirect()->route('review');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }
    }

    public function review_edit($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $data = $this->review->find_single_data($column, $column_value);

            return view('backend.review.edit', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function review_update(Request $request, $id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->review->find_single_data($column, $column_value);
            $validator = Validator::make($request->all(),[
                'name' => 'required|min:3|max:32',
                'comment' => 'required|min:10',
            ], [
                'name.required' => 'Name is required.',
                'name.min' => 'Name min length is 3.',
                'name.max' => 'Name max length is 32.',
                'comment.required' => 'Name is required.',
                'comment.min' => 'Name min length is 10.',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            $update_column = "id";
            $update_column_value = $find_existing_data->id;
            $update_data = [
                'name'      =>$request->name,
                'comment'      =>$request->comment,
            ];

            $this->review->update_data($update_column, $update_column_value, $update_data);
            toastr()->success('Review Update Successfully.');
            return redirect()->route('review');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }

    }

    public function status_change($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->review->find_single_data($column, $column_value);
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

            $this->review->update_data($update_column, $update_column_value, $update_data);
            if ($find_existing_data->status === 0){
                toastr()->success('Review Active Successfully.');
            } else{
                toastr()->success('Review inactive Successfully.');
            }

            return redirect()->route('review');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }

    }

    public function review_remove($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->review->find_single_data($column, $column_value);
            $find_existing_data->delete();

            toastr()->success('Review Remove Successfully');
            return back();
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }
    }

    public function review_trash_list()
    {
        try {
            $data = $this->review->trash_data();
            return view('backend.review.trash', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function review_retrieve($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->review->find_single_trash_data($column, $column_value);
            $find_existing_data->restore();

            toastr()->success('Review Retrieve Successfully');
            return back();
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }
}
