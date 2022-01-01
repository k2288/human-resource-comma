<?php

namespace Raahin\HumanResource\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Raahin\HumanResource\Traits\Searchable;

class Profile extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address',
        'bank_account',
        'Identification_no',
        'identity_card_issue_place',
        'gender',
        'birth_date',
        'children',
        'study_field',
        'study_degree',
        'school',
        "description",
        "home_city",
        "birth_city",
        "postal_code",
        "father_name"
    ];

    /**
     * The columns that can search in
     *
     * @var array
     */
    protected $searchable = [
        'address',
        'bank_account',
        'Identification_no',
        'gender',
        'birth_date',
        'children',
        'study_field',
        "study_degree",
        'school',
        'identity_card_issue_place',
        "description",
        "home_city",
        "birth_city",
        "postal_code",
        "father_name"
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'         => 'integer',
        'birth_date' => 'date',
    ];


    public function user()
    {
        return $this->belongsTo(config("human-resource.users_model_namespace"));
    }
}
