<?php

namespace App\Model;

use App\Notifications\NewReview;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['customer', 'star', 'review'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function notifyProductOwner($product, $review)
    {
        $product->user->notify(new NewReview($product, $review));
    }

}
