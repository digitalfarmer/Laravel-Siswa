@extends('layouts.master')
@section('title','Edit Siswa')

@section('content')
    <div class="panel">
        
        <div class="panel-heading">
            <h3 class="panel-title">Edit Data {{$siswa->nama_depan}} {{$siswa->nama_belakang}}</h3>
        </div>
        <div class="panel-body">
            {{-- eidt form --}}
            <form action="/siswa/{{$siswa->id}}" method="POST">
                {{ csrf_field() }}
                <input name="nama_depan" type="text" class="form-control" value="{{$siswa->nama_depan}}"><br>
                <input name="nama_belakang" type="text" class="form-control" value="{{$siswa->nama_belakang}}"><br>
                <input name="agama" type="text" class="form-control" value="{{$siswa->agama}}"><br>
                <select name="jenis_kelamin" class="custom-select form-control custom-select-lg mb-3" aria-label="Default select example">
                    {{-- <option value="L"  >{{$siswa->jenis_kelamin}}</option> --}}
                    <option value="L" @if ($siswa->jenis_kelamin === 'L')  selected @endif >Laki-Laki</option>
                    <option value="P" @if ($siswa->jenis_kelamin === 'P')  selected @endif >Perempuan</option>
                    <option value="B" @if ($siswa->jenis_kelamin === 'B')  selected @endif >Banci</option>
                </select><br>
                <textarea name="alamat" class="form-control" placeholder="textarea" rows="4">{{$siswa->alamat}}</textarea><br>

                <button type="submit" class="btn btn-primary">Update Data</button>
               
            </form>
             {{-- end edit form --}}
        </div>
    </div>
@endsection