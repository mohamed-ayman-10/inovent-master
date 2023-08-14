<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Speaker extends Model
{
    use
        HasFactory,
        HasTranslations;

    protected $translatable = ['name'];

    protected $guarded = [];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
