<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeStructure extends Model
{
    protected $fillable = [
        'class_id', 
        'academic_year_id', 
        'fee_head_id', 
        'april', 'may', 'june', 'july', 'august', 
        'september', 'october', 'november', 'december', 
        'january', 'february', 'march',
    ];

    // Relationship with AcademicYear
    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }

    // Relationship with Classes
    public function classes()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    // Relationship with FeeHead
    public function feeHead()
    {
        return $this->belongsTo(FeeHead::class, 'fee_head_id');
    }
    
}

       

