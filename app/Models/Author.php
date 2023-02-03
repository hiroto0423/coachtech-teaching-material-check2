<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'age', 'nationality'];

  // 追記：ここから
  public function getDetail()
  {
    $txt = 'ID:'.$this->id . ' ' . $this->name . '(' . $this->age .  '才'.') '.$this->nationality;
    return $txt;
  }
  // 追記：ここまで
}