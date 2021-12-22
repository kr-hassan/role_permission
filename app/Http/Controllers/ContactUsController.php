<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Mockery\CountValidator\Exception;

//use Response;

class ContactUsController extends Controller
{

    public $contact;

    public function __construct()
    {
        $this->contact = new ContactUs();
    }

    public function index()
    {
        try {
            $data = $this->contact->all_data_list();
            return view('backend.contact.index', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function contact()
    {
        try {
            $page = "Contact";
            return view('frontend.contact.index', compact('page'));
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function contact_store(Request $request)
    {
        try {
        $validator = Validator::make($request->all(), [
            'name' => 'required | string',
            'phone' => 'required ',
            'email' => 'required | email',

        ], [
            'name.required' => 'Name is required.',
            'phone.required' => 'Phone is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email is not valid.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $name = $request->input('name');

        if ($request->attached) {

            $attach = $request->file('attached');
            $attach_name = 'articulas_idea_' . md5(now()) . '.' . $attach->getClientOriginalExtension();
            try {
                $attach->move(public_path('files'), $attach_name);
            } catch (Exception $e) {
                return redirect()->back();
            }
        }


        $data = [
            'uuid' => $this->uuid(),
            'name' => $name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'attached' => $attach_name ?? '',
        ];

        $this->contact->store_data($data);
        Session::flash('success', "Thanks for you Message");
        toastr()->success('Your Message');
        return redirect()->route('contact_create');
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function status_change($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->contact->find_single_data($column, $column_value);


            if ($find_existing_data->status === 0) {
                $status = 1;
            } else {
                $status = 0;
            }
            $update_column = "id";
            $update_column_value = $find_existing_data->id;
            $update_data = [
                'status' => $status
            ];

            $this->contact->update_data($update_column, $update_column_value, $update_data);
            if ($find_existing_data->status === 0) {
                toastr()->success('User Active Successfully.');
            } else {
                toastr()->success('User inactive Successfully.');
            }

            return redirect()->route('contact_list');
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }

    }

    public function download($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->contact->find_single_data($column, $column_value);

            $file = $find_existing_data->attached;
            $path = public_path('files/' . $file);
            if (file_exists($path)) {
                return Response()->download($path, $find_existing_data->attached);

            } else {
                toastr()->error('File Not Found');
                return back();
            }
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }
}
