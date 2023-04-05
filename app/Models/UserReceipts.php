<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use App\Models\User;

class UserReceipts extends Model
{
    protected $table = 'receipts'; // table name

    protected $fillable = ['code','name', 'item','count', 'single_price','address']; // fillable fields

    public function items()
    {
        return $this->hasMany(Receipts::class, 'name', 'name');
    }
    public function getAmountAttribute()
    {
        return $this->count * $this->single_price;
    }


    protected static function booted()
    {
        static::creating(function ($receipt) {
            $receipt->code = str_replace(':', '', $receipt->created_at->format('Ymd'));
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

}
