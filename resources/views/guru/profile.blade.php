@extends('layouts.master')

@section('header')
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@stop

@section('content')
    <div class="panel panel-profile">
        <div class="clearfix">
            @if(session('sukses'))
                <div class="alert alert-success" role="alert">
                    {{session('sukses')}}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{session('error')}}
                </div>
        @endif
        <!-- LEFT COLUMN -->
            <div class="profile-left">

                <!-- PROFILE HEADER -->
                <div class="profile-header">

                    <div class="overlay"></div>

                    <div class="profile-main">
                        <img src="" class="img-circle" alt="Avatar">
                        <h3 class="name">{{$guru->nama}}</h3>
                        <span class="online-status status-available">Available</span>
                    </div>
                    <div class="profile-stat">
                        <div class="row">

                        </div>
                    </div>
                </div>
                <!-- END PROFILE HEADER -->

                <!-- PROFILE DETAIL -->
                <div class="profile-detail">
                    <div class="profile-info">
                        <h4 class="heading">Biodata Guru</h4>
                        <ul class="list-unstyled list-justify">
                            <li>Nama Depan <span>{{$guru->nama}}</span></li>
                            <li>Telp <span>{{ $guru->telp}}</span></li>
                            <li>Alamat <span>{{ $guru->alamat}}</span></li>

                        </ul>
                    </div>

{{--                    <div class="text-center"><a href="/siswa/{{$profilesiswa->id}}" class="btn btn-warning">Edit Profile</a></div>--}}
                </div>
                <!-- END PROFILE DETAIL -->
            </div>
            <!-- END LEFT COLUMN -->

            <!-- RIGHT COLUMN -->
            <div class="profile-right">

                <div class="panel">
                    <!-- TABLE STRIPED --><div class="panel-heading">
                        <h3 class="panel-title">Bidang Studi</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>KODE</th>
                                <th>MATA PELAJARAN</th>
                                <th>SEMESTER</th>

                            </tr>
                            </thead>
                            <tbody>


                                    @foreach($guru->mapel as $mapel)
                                        <tr>
                                        <td>{{$mapel->kode}}</td>
                                        <td>{{$mapel->nama}}</td>
                                        <td>{{$mapel->semester}}</td>
                                        </tr>
                                    @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="panel">
                    <div id="chartNilai">

                    </div>
                </div>

                <!-- END TABBED CONTENT -->
            </div>
            <!-- END RIGHT COLUMN -->
        </div>
    </div>

@endsection

