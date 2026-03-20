<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    // These are the "Fillable" fields from your HTML form
    protected $fillable = [
        'full_name',
        'company_name',
        'email',
        'phone',
        'business_size_id',
        'interest_id',
        'message',
        'qr_code_id',
        'source_id',
    ];

    // Relationships (Optional but recommended for the Admin Dashboard)
    public function qrCode()
    {
        return $this->belongsTo(QrCode::class);
    }

    public function businessSize()
    {
        return $this->belongsTo(BusinessSize::class);
    }
    public function source(){
        return $this->belongsTo(Source::class);
    }
    public function interest(){
        return $this->belongsTo(Interest::class);
    }
}
