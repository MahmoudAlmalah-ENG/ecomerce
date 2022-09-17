<?php

namespace App\Models;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = "reviews";

    public function orerItem()
    {
        return $this->belongsTo(OrderItem::class);
    }
}