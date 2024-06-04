<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    //
    public function index(){
        $courses = Courses::all();

        return view('admin.contents.courses.index', [
            'courses' => $courses,
        ]);
    }

    // method untuk menampilkan form tambah courses 
    public function create(){
        // Panggil view
        return view('admin.contents.courses.create');
    }

    // method untuk menyimpan data courses baru
    public function store(Request $request)
    {
       // Validasi data yang diterima
       $request->validate([
        'name' => 'required',
        'category' => 'required',
        'desc' => 'required',
       ]);

       //simpan data ke db
       Courses::create([
        'name' => $request->name,
        'category' => $request->category,
        'desc' => $request->desc,
       ]);

       // redirect ke halaman courses
       return redirect('admin/courses')->with('message', 'Data courses berhasil ditambahkan!');
    }

    // Method untuk menampilkan halaman edit
    public function edit($id)
    {
        // cari data courses berdasarkan id
        $courses = Courses::find($id); // select * FROM courses WHERE id = $id;

        return view('admin.contents.courses.edit',[
            'courses' => $courses
        ]);
    }

    //method untuk menyimpan hasil update
    public function update($id, Request $request){
        // cari data courses berdasarkan id
        $courses = Courses::find($id); // select * FROM courses WHERE id = $id;

        // validasi request
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
        ]);

        // simpan perubahan 
        $courses->update([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        // kembalikan ke halaman courses 
        return redirect('/admin/courses')->with('message', 'Berhasil Mengedit Courses');
    }

    // method untuk menghapus courses 
    public function destory($id){
        // cari data courses berdasarkan id 
        $courses = Courses::find($id); // select * FROM courses WHERE id = $id;

        // hapus courses
        $courses->delete();

        // kembalikan ke halaman courses
        return redirect('/admin/courses')->with('message', 'Berhasil Menghapus Courses');
    }
}
