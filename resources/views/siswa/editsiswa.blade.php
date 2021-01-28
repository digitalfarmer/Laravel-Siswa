@extends('layouts.master')
@section('title','Edit Siswa')

@section('content')
    

    <h1>Edit Data Siswa</h1>
    
    @if (session('sukses'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{session('sukses')}}
        </div>
    @endif
        
    <div class="row">
        <div class="col lg-12">
        
        
        {{-- eidt form --}}
        <form action="/siswa/{{$siswa->id}}" method="POST">
            {{ csrf_field() }}
            {{-- nama depan --}}
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
              <input name="nama_depan" type="text" value="{{$siswa->nama_depan}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            {{-- nama belakang  --}}
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
                <input name="nama_belakang" type="text" value="{{$siswa->nama_belakang}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            {{-- jenis kelamin --}}
            <div class="mb-3">
                <select name="jenis_kelamin" class="custom-select custom-select-lg mb-3" aria-label="Default select example">
                    {{-- <option value="L"  >{{$siswa->jenis_kelamin}}</option> --}}
                    <option value="L" @if ($siswa->jenis_kelamin === 'L')  selected @endif >Laki-Laki</option>
                    <option value="P" @if ($siswa->jenis_kelamin === 'P')  selected @endif >Perempuan</option>
                    <option value="B" @if ($siswa->jenis_kelamin === 'B')  selected @endif >Banci</option>
                  </select>
            </div>
             {{-- Agama  --}}
             <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Agama</label>
                <input name="agama" type="text" value="{{$siswa->agama}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
             {{-- Alamat  --}}
             <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1"  rows="3">{{$siswa->alamat}}</textarea>
            </div>
            <button type="submit" class="btn btn-warning">Update Data</button>
            {{-- end edit form --}}
        </form>
    </div>
    </div>    



@endsection