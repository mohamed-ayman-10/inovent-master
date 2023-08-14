<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Event extends Model
{
    use HasFactory, HasTranslations;

    protected $translatable = ['title', 'description', 'venue'];

    public function tickets() {
        return $this->hasMany(Ticket::class);
    }
}
