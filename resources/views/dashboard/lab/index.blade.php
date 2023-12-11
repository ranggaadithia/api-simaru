@extends('layouts.dashboard')

@section('container')
<div class="d-flex justify-content-between">
 <h1>Ruangan</h1>
 
 <a href="{{ route('labs.create') }}" class="btn btn-primary" style="height: 40px">Tambah Ruangan</a>
</div>

@if (session()->has('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Sukses</strong> {{ session('status') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Gagal</strong> {{ session('error') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<table class="table">
 <thead>
   <tr>
     <th scope="col">#</th>
     <th scope="col">Ruangan</th>
     <th scope="col">Kapasitas</th>
     <th scope="col">Ukuran</th>
     <th scope="col">Aksi</th>
   </tr>
 </thead>
 <tbody>
  @foreach ($labs as $lab)
   <tr>
     <th scope="row">{{ $loop->iteration }}</th>
     <td>{{ $lab->name }}</td>
     <td>
      {{ $lab->capacity }}
     </td>
     <td>
       {{ $lab->size }}
      </td>
     <td class="d-flex">
       <a href="{{ route('labs.edit', ['lab' => $lab->slug]) }}" class="btn btn-warning me-2">Edit</a>
       <form action="{{ route('labs.destroy', $lab->slug) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus lab ini?')">Hapus</button>
      </form>
     </td>
   </tr>
  @endforeach

 </tbody>
</table>
@endsection