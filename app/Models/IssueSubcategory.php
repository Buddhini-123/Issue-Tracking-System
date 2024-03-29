<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueSubcategory extends Model
{
    use HasFactory;
    protected $table = 'issue_subcategories';
    protected $fillable = [
        'issue_id',
        'subcategory_id',
    ];
}
