<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function all_data_list()
    {
        $data = $this->paginate(20);
        return $data;
    }

    public function all_active_data_list()
    {
        $data = $this->whereStatus(1)->latest()->paginate(20);
        return $data;
    }

    public function store_data($data)
    {
        $create_data = $this->create($data);
        return $create_data;
    }

    public function find_single_data($column, $column_value)
    {
        $data = $this->where($column, $column_value)->first();
        return $data;
    }

    public function find_single_trash_data($column, $column_value)
    {
        $data = $this->withTrashed()->where($column, $column_value)->first();
        return $data;
    }

    public function find_multiple_data($column, $column_value)
    {
        $data = $this->where($column, $column_value)->latest()->get();
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
}
