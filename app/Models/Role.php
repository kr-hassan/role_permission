<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }
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
