<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model

{

use HasFactory;

protected $fillable = ['user_id', 'total', 'status'];
public function user(): BelongsTo {

return $this->belongsTo(User::class);

}

public function orderItems(): HasMany

{

return $this->hasMany(OrderItem::class);

}

}