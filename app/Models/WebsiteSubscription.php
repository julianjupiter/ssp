<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSubscription extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'website_id'];
    
    use HasFactory;
}
