<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public $product, $product_image, $category;
    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
        $this->product_image = new ProductImage();
    }

    public function index()
    {
        try {
            $data = $this->product->all_data_list();
            return view('backend.product.index', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function product_create()
    {
        try {
            $category_data = $this->category->all_data_list_dropdown();
            return view('backend.product.create', compact('category_data'));
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function product_store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'name' => 'required|min:3|max:32',
                'category_id'  => 'required',
                'description'  => 'required|min:3',
                'images*' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            ], [
                'name.required' => 'Caption is required.',
                'name.min' => 'Caption min length is 3.',
                'name.max' => 'Caption max length is 32.',
                'category_id.required' => 'Title is required.',
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
                'name'      =>$request->name,
                'category_id'      =>$request->category_id,
                'description'      =>$request->description,
            ];

            $product = $this->product->store_data($data);

            if ($request->images){

                foreach ($request->images as $key=>$image){
                    $photo = $image;
                    $photo_name = 'products_' . md5(now().$key) . '.' . $photo->getClientOriginalExtension();
                    $destinationPath = public_path().'/images/products' ;
                    try {
                        $photo->move($destinationPath, $photo_name);
                        $data_details[] = [
                            'uuid'      =>$this->uuid(),
                            'product_id'     => $product->id,
                            'image'      =>$photo_name,
                            'feature_image'     =>$key == 0 ? '1' : null,
                            'created_at'      =>now(),
                            'updated_at'      =>now(),
                        ];
                    } catch (Exception $e) {
                        return redirect()->back();
                    }
                }
                $this->product_image->store_data($data_details);
            }

            toastr()->success('Product Added Successfully.');
            return redirect()->route('product_list');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }
    }

    public function product_view($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $data = $this->product->find_single_data($column, $column_value);

            return view('backend.product.view', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function product_edit($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $data = $this->product->find_single_data($column, $column_value);
            $category_data = $this->category->all_data_list_dropdown();

            return view('backend.product.edit', compact('data', 'category_data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function product_update(Request $request, $id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->product->find_single_data($column, $column_value);
            $validator = Validator::make($request->all(),[
                'name' => 'required|min:3|max:32',
                'category_id'  => 'required',
                'description'  => 'required|min:3'
            ], [
                'name.required' => 'Title is required.',
                'name.min' => 'Title min length is 3.',
                'name.max' => 'Title max length is 32.',
                'category_id.required' => 'Type is required.',
                'description.required' => 'Button Text is required.',
                'description.min' => 'Button Text min length is 3.'
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            $update_column = "id";
            $update_column_value = $find_existing_data->id;
            $update_data = [
                'name'      =>$request->name,
                'category_id'      =>(int)$request->category_id,
                'description'      =>$request->description,
            ];

            $this->product->update_data($update_column, $update_column_value, $update_data);
            toastr()->success('Product Update Successfully.');
            return redirect()->route('product_list');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }

    }

    public function status_change($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->product->find_single_data($column, $column_value);
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

            $this->product->update_data($update_column, $update_column_value, $update_data);
            if ($find_existing_data->status === 0){
                toastr()->success('Product Active Successfully.');
            } else{
                toastr()->success('Product inactive Successfully.');
            }

            return redirect()->route('product_list');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }

    }

    public function product_remove($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->product->find_single_data($column, $column_value);
            $find_existing_data->delete();

            toastr()->success('Product Remove Successfully');
            return back();
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }
    }

    public function product_trash_list()
    {
        try {
            $data = $this->product->trash_data();
            return view('backend.product.trash', compact('data'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function product_retrieve($id)
    {
        try {
            $column = "uuid";
            $column_value = $id;
            $find_existing_data = $this->product->find_single_trash_data($column, $column_value);
            $find_existing_data->restore();

            toastr()->success('Product Retrieve Successfully');
            return back();
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function product_feature_image_change($uuid)
    {
        $update_column = "uuid";
        $update_column_value = $uuid;
        $update_new_data = [
            'feature_image'      =>'1'
        ];
        $update_all_data = [
            'feature_image'      => null
        ];

        $this->product_image->set_feature_image($update_column, $update_column_value, $update_new_data);
        $this->product_image->remove_feature_image($update_column, $update_column_value, $update_all_data);
        $details_data = $this->product_image->find_single_data($update_column, $update_column_value);
        $column = "id";
        $column_value = $details_data->product_id;
        $data = $this->product->find_single_data($column, $column_value);

        toastr()->success('Product Feature Image Set Successfully');
        return view('backend.product.view', compact('data'));
    }

    public function product_image_remove($uuid)
    {
        try {
            $column = "uuid";
            $column_value = $uuid;
            $find_existing_data = $this->product_image->find_single_data($column, $column_value);

            if ($find_existing_data->image !== null) {
                $photo_name = $find_existing_data->image;
                $destinationPath = public_path().'/images/products' ;
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
                $product_single_image = $this->product_image->find_first_data();
                $update_column = "uuid";
                $update_column_value = $product_single_image->uuid;
                $update_new_data = [
                    'feature_image'      =>'1'
                ];
                $update_all_data = [
                    'feature_image'      => null
                ];

                $this->product_image->set_feature_image($update_column, $update_column_value, $update_new_data);
                $this->product_image->remove_feature_image($update_column, $update_column_value, $update_all_data);
            }

            toastr()->success('Product Image Deleted Successfully');
            return back();
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }
    }

    public function product_image_add($uuid)
    {
        try {
            $column = "uuid";
            $column_value = $uuid;
            $data = $this->product->find_single_data($column, $column_value);
            return view('backend.product.add_image', compact('data'));
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function product_image_store(Request $request, $uuid)
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
            $product = $this->product->find_single_data($column, $column_value);

            if ($request->images){

                foreach ($request->images as $key=>$image){
                    $photo = $image;
                    $photo_name = 'products_' . md5(now().$key) . '.' . $photo->getClientOriginalExtension();
                    $destinationPath = public_path().'/images/products' ;
                    try {
                        $photo->move($destinationPath, $photo_name);
                        $data_details[] = [
                            'uuid'      =>$this->uuid(),
                            'product_id'     => $product->id,
                            'image'      =>$photo_name,
                            'feature_image'     => null,
                            'created_at'      =>now(),
                            'updated_at'      =>now(),
                        ];
                    } catch (Exception $e) {
                        return redirect()->back();
                    }
                }
                $this->product_image->store_data($data_details);
            }

            toastr()->success('Product Image Added Successfully.');
            return redirect()->route('product_list');
        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }
    }
}
