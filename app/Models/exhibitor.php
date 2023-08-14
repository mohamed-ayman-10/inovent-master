<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class exhibitor extends Model
{
    use
        HasFactory,
        HasTranslations;
    protected $table = "exhibitor";
    protected $translatable = ['title'];
    protected $guarded = [];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
