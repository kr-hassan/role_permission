<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function all_data_list()
    {
        $data = $this->with('image')->paginate(20);
        return $data;
    }

/*    public function all_data_frontend()
    {
        $all_data = $this->with('image')->latest()->get();
        if ($all_data->count() < 8){
            $data = $all_data->random($all_data->count());
        } else{
            $data = $all_data->random(8);
        }

        return $data;
    }*/

    public function active_data()
    {
        $data = $this->whereStatus(1)->with('image')->latest()->get();
        return $data;
    }

    public function random_data_frontend($number)
    {
        $all_data = $this->active_data();
        if ($all_data->count() < $number){
            $data = $all_data->random($all_data->count());
        } else{
            $data = $all_data->random($number);
        }

        return $data;
    }

    public function random_category_data_frontend($column, $column_value, $number)
    {
        $data = $this->where($column, $column_value)->with('image')->get()->random($number);
        return $data;
    }

    public function all_active_paginate_data($number)
    {
        $data =$this->whereStatus(1)->with('image')->latest()->paginate($number);
        return $data;
    }

    public function store_data($data)
    {
        $create_data = $this->create($data);
        return $create_data;
    }

    public function find_all_data($column, $column_value)
    {
        $data = $this->where($column, $column_value)->with('image')->get();
        return $data;
    }

    public function find_single_data($column, $column_value)
    {
        $data = $this->where($column, $column_value)->with('image')->first();
        return $data;
    }

    public function find_single_trash_data($column, $column_value)
    {
        $data = $this->withTrashed()->where($column, $column_value)->first();
        return $data;
    }

    public function update_data($column, $column_value, $data)
    {
        $data = $this->where($column, $column_value)->update($data);
        return $data;
    }

    public function trash_data()
    {
        $data = $this->onlyTrashed()->paginate(20);
        return $data;
    }

    public function image()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
