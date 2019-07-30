<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'user_id', 'name', 'description', 'cover_image','published',
    ];

    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'cover_image' => 'image',
        ];
    }


}
