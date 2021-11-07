<?php

namespace Raahin\HumanResource\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Raahin\HumanResource\Traits\Searchable;

class Experience extends Model
{
    use HasFactory, SoftDeletes , Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company',
        'position',
        'start_date',
        'end_date',
    ];

    /**
     * The columns that can search in
     *
     * @var array
     */
    protected $searchable = [
        'company',
        'position',
        'start_date',
        'end_date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'end_date' => 'date',
        'start_date' => 'date',
    ];


    public function user()
    {
        return $this->belongsTo(config("human-resource.users_model_namespace"));
    }
}
