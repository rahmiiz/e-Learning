@extends('admin.main')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"></li>
                <li class="breadcrumb-item active">Courses</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <a href="/admin/courses/create" class="btn btn-primary my-3">+ Courses</a>
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($courses as $courses)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $courses->name }}</td>
                            <td>{{ $courses->category }}</td>
                            <td>{{ $courses->desc }}</td>
                            <td class="d-flex">
                                <a href="/admin/courses/edit/{{ $courses->id }}" class="btn btn-warning me-2">Edit</a>
                                <form action="/admin/courses/delete/{{ $courses->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah Anda Yakin?')">Hapus</button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection
