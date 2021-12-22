<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProjectDetails;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public $project_details;
    public function __construct()
    {
        $this->project_details = new ProjectDetails();
    }

    public function ajax_gallery_image_delete(Request $request)
    {
        dd($request->id);
    }
}
