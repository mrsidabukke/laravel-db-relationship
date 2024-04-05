<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\course;
class coursecontroller extends Controller
{

    public function index()
    {
    $courses = course::all();
    return view('course.index', compact('courses'));
}

public function join($id)
{
    $course = course::find($id);
    // cara menyimpan data user yang join ke dalam course ke tabel pivot
    $user = Auth::user();
    // $user->courses()->attach($id);
    // toggle digunakan untuk menambahkan data ke tabel pivot jika data tersebut belum ada, dan menghapus data dari tabel pivot jika data tersebut sudah ada
    // atau membalikan keadaan
    $user->courses()->toggle([$id]);
   
    return redirect('/course');

}

// public function unjoin($id)
// {
//     $course = course::find($id);
//     // cara menghapus data user yang join ke dalam course ke tabel pivot
//     $user = Auth::user();
//     $user->courses()->detach($id);

//     return redirect('/course');
// }
}