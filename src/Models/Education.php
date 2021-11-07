<?php

namespace Raahin\HumanResource\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Raahin\HumanResource\Traits\Searchable;

class Education extends Model
{
    use HasFactory, SoftDeletes , Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_date',
        'end_date',
        'school',
        "description"
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
    ];


    public function user()
    {
        return $this->belongsTo(config("human-resource.users_model_namespace"));
    }
}
