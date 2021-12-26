<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\AboutUsController;
use App\Http\Controllers\Backend\OurTeamController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageController;
use App\Http\Controllers\Frontend\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//Route::resource('users', UserController::class);

/****************************************Frontend Route Start Here****************************************/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'about_us'])->name('about_us');
Route::get('/project', [HomeController::class, 'project'])->name('project');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/product', [HomeController::class, 'product'])->name('product');
Route::get('/product-details/{uuid}', [HomeController::class, 'product_details'])->name('product_details');
Route::get('/service', [HomeController::class, 'service'])->name('service');
Route::get('/service-details/{uuid}', [HomeController::class, 'service_details'])->name('service_details');
Route::get('/project-ongoing', [HomeController::class, 'ongoing_project'])->name('ongoing_project');
Route::get('/project-completed', [HomeController::class, 'completed_project'])->name('completed_project');
/****************************************Contact Us Route Start Here****************************************/
Route::get('/contact', [ContactUsController::class, 'contact'])->name('contact');
Route::post('/contact-create', [ContactUsController::class, 'contact_store'])->name('contact_store');
Route::get('/contact-status/{id}', [ContactUsController::class, 'status_change'])->name('contact_status_change');
/****************************************Contact Us Route End Here****************************************/
/****************************************Frontend Route End Here****************************************/
/****************************************Backend Route Start Here****************************************/
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login_process', [LoginController::class, 'login_process'])->name('login_process');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('preventBackHistory');

Route::group(['middleware' => 'auth'],function(){
    Route::get('/admin', [LoginController::class, 'admin'])->name('admin');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /***************************************Contact List for Admin***********************************/
    Route::get('/contact_list', [ContactUsController::class, 'index'])->name('contact_list');
    Route::get('/download/{id}', [ContactUsController::class, 'download'])->name('fileDownload');
    /***************************************End Contact List for Admin***********************************/

    /****************************************User Route Start Here****************************************/
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user-create', [UserController::class, 'user_create'])->name('user_create');
    Route::post('/user-create', [UserController::class, 'user_store'])->name('user_store');
    Route::get('/user-edit/{id}', [UserController::class, 'user_edit'])->name('user_edit');
    Route::post('/user-update/{id}', [UserController::class, 'user_update'])->name('user_update');
    Route::get('/user-status/{id}', [UserController::class, 'status_change'])->name('user_status_change');
    Route::get('/user-remove/{id}', [UserController::class, 'user_remove'])->name('user_remove');
    Route::get('/user-trash', [UserController::class, 'user_trash_list'])->name('user_trash_list');
    Route::get('/user-retrieve/{id}', [UserController::class, 'user_retrieve'])->name('user_retrieve');
    Route::get('/password-reset/{id}', [UserController::class, 'password_reset'])->name('password_reset');
    /****************************************User Route End Here****************************************/

    /****************************************Category Route Start Here****************************************/
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/category-create', [CategoryController::class, 'category_create'])->name('category_create');
    Route::post('/category-create', [CategoryController::class, 'category_store'])->name('category_store');
    Route::get('/category-edit/{id}', [CategoryController::class, 'category_edit'])->name('category_edit');
    Route::post('/category-update/{id}', [CategoryController::class, 'category_update'])->name('category_update');
    Route::get('/category-status/{id}', [CategoryController::class, 'status_change'])->name('category_status_change');
    Route::get('/category-remove/{id}', [CategoryController::class, 'category_remove'])->name('category_remove');
    Route::get('/category-trash', [CategoryController::class, 'category_trash_list'])->name('category_trash_list');
    Route::get('/category-retrieve/{id}', [CategoryController::class, 'category_retrieve'])->name('category_retrieve');
    /****************************************Category Route End Here****************************************/

    /****************************************Slider Route Start Here****************************************/
    Route::get('/slider', [SliderController::class, 'index'])->name('slider');
    Route::get('/slider-create', [SliderController::class, 'slider_create'])->name('slider_create');
    Route::post('/slider-create', [SliderController::class, 'slider_store'])->name('slider_store');
    Route::get('/slider-edit/{id}', [SliderController::class, 'slider_edit'])->name('slider_edit');
    Route::post('/slider-update/{id}', [SliderController::class, 'slider_update'])->name('slider_update');
    Route::get('/slider-status/{id}', [SliderController::class, 'status_change'])->name('slider_status_change');
    Route::get('/slider-remove/{id}', [SliderController::class, 'slider_remove'])->name('slider_remove');
    Route::get('/slider-trash', [SliderController::class, 'slider_trash_list'])->name('slider_trash_list');
    Route::get('/slider-retrieve/{id}', [SliderController::class, 'slider_retrieve'])->name('slider_retrieve');
    /****************************************Slider Route End Here*****************************************/

    /****************************************About Us Route Start Here****************************************/
    Route::get('/about-us-list', [AboutUsController::class, 'index'])->name('about_us_list');
    Route::get('/about-us-create', [AboutUsController::class, 'about_us_create'])->name('about_us_create');
    Route::post('/about-us-create', [AboutUsController::class, 'about_us_store'])->name('about_us_store');
    Route::get('/about-us-edit/{id}', [AboutUsController::class, 'about_us_edit'])->name('about_us_edit');
    Route::post('/about-us-update/{id}', [AboutUsController::class, 'about_us_update'])->name('about_us_update');
    /****************************************About Us Route End Here****************************************/

    /****************************************Our Team Route Start Here****************************************/
    Route::get('/our-team', [OurTeamController::class, 'index'])->name('our_team_list');
    Route::get('/our-team-create', [OurTeamController::class, 'our_team_create'])->name('our_team_create');
    Route::post('/our-team-create', [OurTeamController::class, 'our_team_store'])->name('our_team_store');
    Route::get('/our-team-view/{id}', [OurTeamController::class, 'our_team_view'])->name('our_team_view');
    Route::get('/our-team-edit/{id}', [OurTeamController::class, 'our_team_edit'])->name('our_team_edit');
    Route::post('/our-team-update/{id}', [OurTeamController::class, 'our_team_update'])->name('our_team_update');
    Route::get('/our-team-status/{id}', [OurTeamController::class, 'status_change'])->name('our_team_status_change');
    Route::get('/our-team-remove/{id}', [OurTeamController::class, 'our_team_remove'])->name('our_team_remove');
    Route::get('/our-team-trash', [OurTeamController::class, 'our_team_trash_list'])->name('our_team_trash_list');
    Route::get('/our-team-retrieve/{id}', [OurTeamController::class, 'our_team_retrieve'])->name('our_team_retrieve');
    /****************************************Our Team Route End Here****************************************/

    /****************************************Service Route Start Here****************************************/
    Route::get('/service-list', [ServiceController::class, 'index'])->name('service_list');
    Route::get('/service-create', [ServiceController::class, 'service_create'])->name('service_create');
    Route::post('/service-create', [ServiceController::class, 'service_store'])->name('service_store');
    Route::get('/service-view/{id}', [ServiceController::class, 'service_view'])->name('service_view');
    Route::get('/service-edit/{id}', [ServiceController::class, 'service_edit'])->name('service_edit');
    Route::post('/service-update/{id}', [ServiceController::class, 'service_update'])->name('service_update');
    Route::get('/service-status/{id}', [ServiceController::class, 'status_change'])->name('service_status_change');
    Route::get('/service-remove/{id}', [ServiceController::class, 'service_remove'])->name('service_remove');
    Route::get('/service-trash', [ServiceController::class, 'service_trash_list'])->name('service_trash_list');
    Route::get('/service-retrieve/{id}', [ServiceController::class, 'service_retrieve'])->name('service_retrieve');
    /****************************************Service Route End Here****************************************/

    /****************************************Project Route Start Here****************************************/
    Route::get('/project-list', [ProjectController::class, 'index'])->name('project_list');
    Route::get('/project-create', [ProjectController::class, 'project_create'])->name('project_create');
    Route::post('/project-create', [ProjectController::class, 'project_store'])->name('project_store');
    Route::get('/project-view/{id}', [ProjectController::class, 'project_view'])->name('project_view');
    Route::get('/project-edit/{id}', [ProjectController::class, 'project_edit'])->name('project_edit');
    Route::post('/project-update/{id}', [ProjectController::class, 'project_update'])->name('project_update');
    Route::get('/project-status/{id}', [ProjectController::class, 'status_change'])->name('project_status_change');
    Route::get('/project-remove/{id}', [ProjectController::class, 'project_remove'])->name('project_remove');
    Route::get('/project-trash', [ProjectController::class, 'project_trash_list'])->name('project_trash_list');
    Route::get('/project-retrieve/{id}', [ProjectController::class, 'project_retrieve'])->name('project_retrieve');
    Route::get('/project-feature-image-change/{id}', [ProjectController::class, 'project_feature_image_change'])->name('project_feature_image_change');
    Route::get('/project-image-remove/{id}', [ProjectController::class, 'project_image_remove'])->name('project_image_remove');
    Route::get('/project-image-add/{id}', [ProjectController::class, 'project_image_add'])->name('project_image_add');
    Route::post('/project-image-store/{id}', [ProjectController::class, 'project_image_store'])->name('project_image_store');
    /****************************************Project Route End Here****************************************/

    /****************************************Product Route Start Here****************************************/
    Route::get('/product-list', [ProductController::class, 'index'])->name('product_list');
    Route::get('/product-create', [ProductController::class, 'product_create'])->name('product_create');
    Route::post('/product-create', [ProductController::class, 'product_store'])->name('product_store');
    Route::get('/product-view/{id}', [ProductController::class, 'product_view'])->name('product_view');
    Route::get('/product-edit/{id}', [ProductController::class, 'product_edit'])->name('product_edit');
    Route::post('/product-update/{id}', [ProductController::class, 'product_update'])->name('product_update');
    Route::get('/product-status/{id}', [ProductController::class, 'status_change'])->name('product_status_change');
    Route::get('/product-remove/{id}', [ProductController::class, 'product_remove'])->name('product_remove');
    Route::get('/product-trash', [ProductController::class, 'product_trash_list'])->name('product_trash_list');
    Route::get('/product-retrieve/{id}', [ProductController::class, 'product_retrieve'])->name('product_retrieve');
    Route::get('/product-feature-image-change/{id}', [ProductController::class, 'product_feature_image_change'])->name('product_feature_image_change');
    Route::get('/product-image-remove/{id}', [ProductController::class, 'product_image_remove'])->name('product_image_remove');
    Route::get('/product-image-add/{id}', [ProductController::class, 'product_image_add'])->name('product_image_add');
    Route::post('/product-image-store/{id}', [ProductController::class, 'product_image_store'])->name('product_image_store');
    /****************************************Product Route End Here****************************************/

    /****************************************Gallery Route Start Here****************************************/
    Route::get('/gallery-list', [GalleryController::class, 'index'])->name('gallery_list');
    Route::post('/gallery-create', [GalleryController::class, 'gallery_store'])->name('gallery_store');
    Route::get('/gallery-image-remove/{id}', [GalleryController::class, 'gallery_image_remove'])->name('gallery_image_remove');
    /****************************************Gallery Route End Here****************************************/

    /****************************************Review Route Start Here****************************************/
    Route::get('/review', [ReviewController::class, 'index'])->name('review');
    Route::get('/review-create', [ReviewController::class, 'review_create'])->name('review_create');
    Route::post('/review-create', [ReviewController::class, 'review_store'])->name('review_store');
    Route::get('/review-view/{id}', [ReviewController::class, 'review_view'])->name('review_view');
    Route::get('/review-edit/{id}', [ReviewController::class, 'review_edit'])->name('review_edit');
    Route::post('/review-update/{id}', [ReviewController::class, 'review_update'])->name('review_update');
    Route::get('/review-status/{id}', [ReviewController::class, 'status_change'])->name('review_status_change');
    Route::get('/review-remove/{id}', [ReviewController::class, 'review_remove'])->name('review_remove');
    Route::get('/review-trash', [ReviewController::class, 'review_trash_list'])->name('review_trash_list');
    Route::get('/review-retrieve/{id}', [ReviewController::class, 'review_retrieve'])->name('review_retrieve');
    /****************************************Review Route End Here****************************************/
});

/****************************************Backend Route End Here****************************************/
