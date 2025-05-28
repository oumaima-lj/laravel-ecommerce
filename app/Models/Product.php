<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

use HasFactory;

protected $fillable = ['name', 'description', 'price',
'stock', 'image', 'category_id'];

public function category(): BelongsTo

{

return $this->belongsTo(Category::class);

}
}
