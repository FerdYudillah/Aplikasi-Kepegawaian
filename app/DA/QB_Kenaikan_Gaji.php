<?php
namespace App\DA;
use Illuminate\Support\Facades\DB;
class QB_Kenaikan_Gaji
{

  public static function getById($id)
  {
    return DB::table('naik_berkalas as n')->select('n.*','g.gaji_pokok')->leftJoin('gajis as g', 'n.gaji_id', '=', 'g.id')->where('n.id', $id)->first();
  }

  public static function getAll()
    {
        return DB::table('naik_berkalas as n')->select('n.*','u.nip', 'u.name')->leftJoin('users as u','n.user_id','=','u.id')->where('ket','Belum Disetujui')
        ->get();
  }

  public static function reminderGaji()
  {
    return DB::table('naik_berkalas as n')->select('n.*','u.nip', 'u.name')->leftJoin('users as u','n.user_id','=','u.id')->where('naik_selanjutnya','<=',date('Y-m-d'))->whereNull('is_hapus')
    ->get();
  }

  public static function betweenPDF($tgl_pertama, $tgl_kedua)
  {
    $tgl_pertama = '2022-06-01'; $endDate = '2022-06-30'; Post::whereBetween(DB::raw('DATE(created_at)'), [$startDate, $endDate])->get();
  }

}
