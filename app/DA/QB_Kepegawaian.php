<?php
namespace App\DA;
use Illuminate\Support\Facades\DB;
class QB_Kepegawaian
{
  public static function getAllPegawai()
  {
    return DB::table('users as u')->leftJoin('kepegawaians as k', 'u.id','=','k.user_id')->get();
  }
  public static function getPegawaiByID($id)
  {
    return DB::table('users as u')->leftJoin('kepegawaians as k', 'u.id','=','k.user_id')
      ->where('u.id', $id)->first();
  }
  public static function getKepalaSatuan()
  {
    return DB::table('users as u')->leftJoin('kepegawaians as k', 'u.id','=','k.user_id')->where('k.isKepalaSatuan', 1)->first();
  }
}