<?php

namespace App\Http\Controllers;

use App\DA\LandingPage;
use Illuminate\Http\Request;
use Alert;

class LandingPageController extends Controller
{

  public function show()
  {
    $list = LandingPage::getAll();
    return view('welcome', compact('list'));
  }


  public function list()
  {
    if (auth()->user()->role == 'Kepala') {
        Abort(403);
    }
    $list = LandingPage::getAll();
    return view('admin.master-data.landing-page.list', compact('list'));
  }


  public function form($id)
  {
    if (auth()->user()->role == 'Kepala') {
        Abort(403);
    }
    $data = LandingPage::getById($id);
    return view('admin.master-data.landing-page.form', compact('data'));
  }


  public function save($id, Request $req)
  {
    // dd($req,$id);
    if(LandingPage::getById($id)){
      //todo update
      $validateData = $req->validate([
        'tittle' => 'required',
        'deskripsi' => 'required',
        'foto_landing_page' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
      ]);
      LandingPage::update($id, $validateData);
    }else{
      //todo insert
      $validateData = $req->validate([
        'tittle' => 'required',
        'deskripsi' => 'required',
        'foto_landing_page' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
      ]);
      $id = LandingPage::insert($validateData);
    }
    if($req->file('foto_landing_page')){
      $fileName = $id.'.'.$req->file('foto_landing_page')->getClientOriginalExtension();
      $req->file('foto_landing_page')->storeAs('uploads/landing_page', $fileName, 'public');
      LandingPage::update($id,["foto_landing_page"=>$fileName]);
    }
    Alert::success('Sukses', 'Berhasil Menyimpan');
    return redirect('/Admin/landing-pages');
  }


  public function delete(Request $req)
  {
    if (auth()->user()->role == 'Kepala') {
        Abort(403);
    }
    LandingPage::delete($req->id);
    Alert::success('Sukses', 'Berhasil Menghapus');
    return redirect('/Admin/landing-pages');
  }

}
