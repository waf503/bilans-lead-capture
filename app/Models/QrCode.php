<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QrCode extends Model
{
    protected $fillable = ['internal_name', 'slug','scan_count','source_id', 'is_active'];

    public function source(){
        return $this->belongsTo(Source::class);
    }
}
