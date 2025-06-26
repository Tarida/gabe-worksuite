<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillOfMaterialController extends Model
{
    use HasFactory;
    protected $table = 'bill_of_materials';
    protected $fillable = ['name', 'price', 'description', 'taxes'];
}
