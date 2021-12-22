<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function all_data_list()
    {
        $data = $this->paginate(20);
        return $data;
    }

    public function store_data($data)
    {
        $create_data = $this->create($data);
        return $create_data;
    }

    public function update_data($column, $column_value, $data)
    {
        $data = $this->where($column, $column_value)->update($data);
        return $data;
    }
    public function find_single_data($column, $column_value)
    {
        $data = $this->where($column, $column_value)->first();
        return $data;
    }

}
