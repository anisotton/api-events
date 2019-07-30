<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'id_user', 'name', 'description', 'cover_image','publised',
    ];

    public function rules()
    {
        return [
            'id_user' => 'required',
            'name' => 'required',
            'description' => 'required',
            'cover_image' => 'image',
        ];
    }
}
