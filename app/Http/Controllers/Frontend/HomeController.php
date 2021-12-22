<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\OurTeam;
use App\Models\Product;
use App\Models\Project;
use App\Models\Review;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $slider, $service, $our_team, $about_us, $review, $project, $gallery, $product, $category;
    public function __construct()
    {
        $this->slider = new Slider();
        $this->our_team = new OurTeam();
        $this->about_us = new AboutUs();
        $this->review = new Review();
        $this->service = new Service();
        $this->project = new Project();
        $this->gallery = new Gallery();
        $this->product = new Product();
        $this->category = new Category();
    }

    public function index()
    {
        $sliders = $this->slider->all_active_data_list();
        $about_us = $this->about_us->frontend_data();
        $our_team = $this->our_team->all_data_frontend();
        $reviews = $this->review->all_data_frontend();
        $services = $this->service->random_data_frontend(3);
        $projects = $this->project->all_data_frontend();
        return view('frontend.home.index', compact('sliders','about_us', 'services', 'projects', 'our_team', 'reviews'));
    }

    public function about_us()
    {
        $about_us = $this->about_us->frontend_data();
        $our_team = $this->our_team->all_data_frontend();
        $reviews = $this->review->all_data_frontend();
        $page = "About Us";
        return view('frontend.about_us.index', compact('page', 'our_team', 'about_us', 'reviews'));
    }

    public function all_project()
    {
        $projects = $this->project->all_active_data_list();
        return $projects;
    }

    public function project()
    {
        $projects = $this->all_project();
        $page = "Projects";
        return view('frontend.project.index', compact('page', 'projects'));
    }

    public function gallery()
    {
        $gallerys = $this->gallery->all_active_data_list();
        $page = "Gallery";
        return view('frontend.gallery.index', compact('page', 'gallerys'));
    }

    public function ongoing_project()
    {
        $projects = $this->all_project()->where('type', 'Ongoing');
        $page = "Ongoing Projects";
        return view('frontend.project.index', compact('page', 'projects'));
    }

    public function completed_project()
    {
        $projects = $this->all_project()->where('type', 'Completed');
        $page = "Completed Projects";
        return view('frontend.project.index', compact('page', 'projects'));
    }

    public function product()
    {
        try {
            $products = $this->product->all_active_paginate_data(20);
            $random_products = $this->product->random_data_frontend(5);
            $categories = $this->category->random_data_frontend(5);
            $page = "Shop";

            return view('frontend.products.index', compact('page', 'products', 'categories', 'random_products'));
        } catch (\Throwable $throwable){
            return back()->withErrors($throwable->getMessage());
        }
    }

    public function product_details($uuid)
    {
        try {
            $column = 'uuid';
            $column_value = $uuid;
            $product_details = $this->product->find_single_data($column, $column_value);
            $category_column = 'category_id';
            $category_column_value = $product_details->category_id;
            $category_products = $this->product->random_category_data_frontend($category_column, $category_column_value, 5);
            $categories = $this->category->random_data_frontend(5);
            $page = "Product Details";
            return view('frontend.products.single_product', compact('page', 'product_details', 'category_products', 'categories'));
        } catch (\Throwable $throwable){
            return back()->withErrors($throwable->getMessage());
        }

    }

    public function service()
    {
        try {
            $services = $this->service->all_active_paginate_data(20);
            $random_services = $this->service->random_data_frontend(5);
            $categories = $this->category->random_data_frontend(5);
            $page = "Service";

            return view('frontend.services.index', compact('page', 'services', 'categories', 'random_services'));
        } catch (\Throwable $throwable){
            return back()->withErrors($throwable->getMessage());
        }
    }

    public function service_details($uuid)
    {
        try {
            $column = 'uuid';
            $column_value = $uuid;
            $service_details = $this->service->find_single_data($column, $column_value);
            $page = "Service Details";
            return view('frontend.services.single_service', compact('page', 'service_details'));
        } catch (\Throwable $throwable){
            return back()->withErrors($throwable->getMessage());
        }

    }
}
