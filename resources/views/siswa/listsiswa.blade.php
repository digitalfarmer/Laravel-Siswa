@extends('layouts.master')
@section('title','Daftar Siswa')
@section('js')
$(".alert").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert").slideUp(500);
});
@endsection
@section('content')
    

   
    @if (session('sukses'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{session('sukses')}}
        </div>
    @endif
        
    <div class="row">
        <div class="col-6">
            <h1>Data Peserta Didik</h1>
        </div>
        <div class="col-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary float-right btm-sm" data-toggle="modal" data-target="#exampleModal">

                Input
            </button>
            
            
        </div>
        <table class="table table-hover">
            <tr>
                <th>Nama thDepan</th>                                      
                <th>Nama Belakang</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            @foreach ($siswas as $siswa)
            <tr>
                <td>{{$siswa->nama_depan}}</td>
                <td>{{$siswa->nama_belakang}}</td>
                <td>{{$siswa->jenis_kelamin}}</td>
                <td>{{$siswa->agama}}</td>
                <td>{{$siswa->alamat}}</td>
                <td>
                    <a href="/siswa/{{$siswa->id}}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau di hapus?')">Delete</a>
                </td>
            </tr>
            @endforeach
         </table>
    </div>
    



<!-- Modal Input-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">

        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Siswa Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>

        <div class="modal-body">
            <form action="/siswa" method="POST">
                {{ csrf_field() }}
                {{-- nama depan --}}
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
                  <input name="nama_depan" type="text" placeholder="isi dengan nama depan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                {{-- nama belakang  --}}
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
                    <input name="nama_belakang" type="text" placeholder="isi dengan nama belakang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                {{-- jenis kelamin --}}
                <div class="mb-3">
                    <select name="jenis_kelamin" class="custom-select custom-select-lg mb-3" aria-label="Default select example">
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                        <option value="B">Banci</option>
                      </select>
                </div>
                 {{-- Agama  --}}
                 <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Agama</label>
                    <input name="agama" type="text" placeholder="Agama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                 {{-- Alamat  --}}
                 <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" placeholder="alamat lengkap" rows="3"></textarea>
                </div>
                
                
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    </div>
</div>
<!-- EndModal -->

@endsection