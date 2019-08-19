<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Genre;
use App\Actor;

class Movie extends Model
{
    protected $fillable = [
      'title',
      'length',
      'rating',
      'awards',
      'release_date',
      'genre_id',
      'created_at',
      'updated_at',
   ];

   public function genre()
   {
      return $this->belongsTo(Genre::class);
   }

   public function actors()
   {
      return $this->belongsToMany(Actor::class);
   }
}
