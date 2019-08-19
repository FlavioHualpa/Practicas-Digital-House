<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;

class Actor extends Model
{
   protected $guarded = [];

    public function getNombreCompleto() : string {
      return $this->first_name . ' ' . $this->last_name;
   }

   public function portraitStyle() : string
   {
      if ($this->portrait_url) {
         return 'style="
            background-image: url(/storage/' . $this->portrait_url  . ');
            background-position: center;
            background-size: cover;"
         ';
      }
      return '';
   }

   public function favoriteMovie()
   {
      return $this->belongsTo(Movie::class);
   }

   public function movies()
   {
      return $this->belongsToMany(Movie::class);
   }
}
