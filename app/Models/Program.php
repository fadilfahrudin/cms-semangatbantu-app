<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Program extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'program_by', 'types', 'description', 'target_amount', 'collage_amount', 'end_program', 'banner_program' 
    ];

     public function toArray()
    {
        $toArray = parent::toArray();
        $toArray['banner_program'] = $this->banner_program;
        return $toArray;
    }

     public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value){
        return Carbon::parse($value)->timestamp;
    }

    public function getBannerProgramAttribute($image){
        return url('') . Storage::url($this->attributes['banner_program']);
    }
}
