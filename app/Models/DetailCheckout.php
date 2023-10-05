<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCheckout extends Model
{
    use HasFactory;
    protected $table = 'detail_checkout';
    protected $primaryKey = 'id_detail_checkout';
}
