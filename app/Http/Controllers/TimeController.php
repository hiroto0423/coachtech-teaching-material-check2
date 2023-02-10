<?php

namespace App\Http\Controllers;
// Carbonを読み込む
use Carbon\Carbon;

class TimeController extends Controller
{
  public function index(){
    $dt = Carbon::now(); // Carbonを使って今日の日付を取得
    $times = [
      "Year" => $dt->year,
      "Month" => $dt->month,
      "Day" => $dt->day,
      "Hour" => $dt->hour,
      "Minute" => $dt->minute,
    ];
    return view('time', ['times' => $times]);
  }
}