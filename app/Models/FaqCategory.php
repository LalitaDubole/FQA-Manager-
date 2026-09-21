<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class FaqCategory extends Model
{
    protected $fillable = ['name', 'slug', 'order'];

    protected static function booted()
    {
        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class)->orderBy('order');
    }

    public function publishedFaqs()
    {
        return $this->hasMany(Faq::class)->where('is_published', true)->orderBy('order');
    }
}