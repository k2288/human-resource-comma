<?php

namespace Raahin\HumanResource\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Raahin\HumanResource\Traits\Searchable;

class EmergencyContact extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'mobile',
        'description',
    ];

    /**
     * The columns that can search in
     *
     * @var array
     */
    protected $searchable = [
        'name',
        'phone',
        'mobile',
        'description',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];


    public function user()
    {
        return $this->belongsTo(config("human-resource.users_model_namespace"));
    }
}
