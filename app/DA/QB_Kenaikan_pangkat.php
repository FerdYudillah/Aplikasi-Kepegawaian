<?php
namespace App\DA;
use Illuminate\Support\Facades\DB;
class QB_Kenaikan_pangkat
{
  //store data ada di eloquent

  public static function deleteUsulan($id)
  {
    DB::table('naik_pangkats')->where('id', $id)->delete();
  }
  public static function getById($id)
  {
    return DB::table('naik_pangkats as n')
      ->leftJoin('pangkats as p', 'n.pangkat_id','=','p.id_pangkat')->where('n.id', $id)->first();
  }
  public static function getAllByUserUsulan($user_id,$jenis_usulan)
  {
    return DB::table('naik_pangkats')->where('user_id', $user_id)->where('jenis_usulan', $jenis_usulan)->get();
  }
  public static function getAll()
  {
    return DB::table('naik_pangkats as n')
    ->select(DB::raw('(CASE
          WHEN jenis_usulan=1 THEN "Jabatan Reguler Eselon Struktural"
          WHEN jenis_usulan=2 THEN "Jabatan Pelaksana/Staf"
          WHEN jenis_usulan=3 THEN "Jabatan Pelaksana/Staf Penyesuaian Ijazah"
          WHEN jenis_usulan=4 THEN "Jabatan Fungsional Tertentu"
          ELSE "Not Filled"
      END) as jabatan, (CASE
          WHEN jenis_usulan=1 THEN "/Admin/index-struktural"
          WHEN jenis_usulan=2 THEN "/Admin/index-pelasana-staf"
          WHEN jenis_usulan=3 THEN "/Admin/index-pelasana-staf-ijazah"
          WHEN jenis_usulan=4 THEN "/Admin/index-fungsional"
          ELSE "Not Filled"
      END) as link_approve,n.*,u.name,u.nip'))
    ->leftJoin('users as u','n.user_id','=','u.id')->where('ket','Belum Disetujui')
    ->get();
  }

  public static function reminderData()
  {
    return DB::table('naik_pangkats as n')
    ->select(DB::raw('(CASE
          WHEN jenis_usulan=1 THEN "Jabatan Reguler Eselon Struktural"
          WHEN jenis_usulan=2 THEN "Jabatan Pelaksana/Staf"
          WHEN jenis_usulan=3 THEN "Jabatan Pelaksana/Staf Penyesuaian Ijazah"
          WHEN jenis_usulan=4 THEN "Jabatan Fungsional Tertentu"
          ELSE "Not Filled"
      END) as jabatan, (CASE
          WHEN jenis_usulan=1 THEN "/Admin/index-struktural"
          WHEN jenis_usulan=2 THEN "/Admin/index-pelasana-staf"
          WHEN jenis_usulan=3 THEN "/Admin/index-pelasana-staf-ijazah"
          WHEN jenis_usulan=4 THEN "/Admin/index-fungsional"
          ELSE "Not Filled"
      END) as link_approve,n.*,u.name,u.nip'))
    ->leftJoin('users as u','n.user_id','=','u.id')->where('naik_selanjutnya','<=',date('Y-m-d'))->whereNull('is_hapus')
    ->get();
  }
}
