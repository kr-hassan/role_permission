<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDetails extends Model
{
    use HasFactory;

    public function store_data($data)
    {
        $create_data = $this->insert($data);
        return $create_data;
    }

    public function find_first_data()
    {
        $data = $this->where('feature_image', null)->first();
        return $data;
    }

    public function find_single_data($column, $column_value)
    {
        $data = $this->where($column, $column_value)->first();
        return $data;
    }

    public function set_feature_image($column, $column_value, $data)
    {
        $data = $this->where($column, $column_value)->update($data);
        return $data;
    }

    public function remove_feature_image($column, $column_value, $data)
    {
        $data = $this->where($column,'!=', $column_value)->update($data);
        return $data;
    }
}
