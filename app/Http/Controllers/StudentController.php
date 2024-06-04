<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // method untuk menampilkan data student
    public function index(){
        // tarik data student dari db
        $students = Student::all();

        // panggil view dan kirim data students
        return view('admin.contents.student.index', [
            'students' => $students, 
        ]);
    }

    // method untuk menampilkan form tambah student 
    public function create(){
        // Panggil view
        return view('admin.contents.student.create');
    }

    // method untuk menyimpan data student baru
    public function store(Request $request)
    {
       // Validasi data yang diterima
       $request->validate([
        'name' => 'required',
        'nim' => 'required|numeric',
        'major' => 'required',
        'class' => 'required',
       ]);

       //simpan data ke db
       Student::create([
        'name' => $request->name,
        'nim' => $request->nim,
        'major' => $request->major,
        'class' => $request->class,
       ]);

       // redirect ke halaman student
       return redirect('admin/student')->with('message', 'Data student berhasil ditambahkan!');
    }

    // Method untuk menampilkan halaman edit
    public function edit($id)
    {
        // cari data student berdasarkan id
        $student = Student::find($id); // select * FROM students WHERE id = $id;

        return view('admin.contents.student.edit',[
            'student' => $student
        ]);
    }

    //method untuk menyimpan hasil update
    public function update($id, Request $request){
        // cari data student berdasarkan id
        $student = Student::find($id); // select * FROM students WHERE id = $id;

        // validasi request
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required',
        ]);

        // simpan perubahan 
        $student->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
        ]);

        // kembalikan ke halaman student 
        return redirect('/admin/student')->with('message', 'Berhasil Mengedit Student');
    }

    // method untuk menghapus student 
    public function destory($id){
        // cari data student berdasarkan id 
        $student = Student::find($id); // select * FROM students WHERE id = $id;

        // hapus student
        $student->delete();

        // kembalikan ke halaman student 
        return redirect('/admin/student')->with('message', 'Berhasil Menghapus Student');
    }
}
