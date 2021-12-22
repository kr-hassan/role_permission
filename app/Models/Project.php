<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function all_data_list()
    {
        $data = $this->with('project_details')->paginate(20);
        return $data;
    }

    public function all_data_frontend()
    {
        $all_data = $this->with('project_details')->latest()->get();
        if ($all_data->count() < 8){
            $data = $all_data->random($all_data->count());
        } else{
            $data = $all_data->random(8);
        }

        return $data;
    }

    public function all_active_data_list()
    {
        $data = $this->whereStatus(1)->with('project_details')->latest()->paginate(20);
        return $data;
    }

    public function store_data($data)
    {
        $create_data = $this->create($data);
        return $create_data;
    }

    public function find_single_data($column, $column_value)
    {
        $data = $this->where($column, $column_value)->with('project_details')->first();
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

    public function project_details()
    {
        return $this->hasMany(ProjectDetails::class, 'project_id', 'id');
    }
}
