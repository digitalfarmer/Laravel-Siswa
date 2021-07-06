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
					<img src="{{$siswa->getAvatar()}}" class="img-circle" alt="Avatar">
					<h3 class="name">{{$siswa->nama_depan}}	{{ $siswa->nama_belakang}}</h3>
					<span class="online-status status-available">Available</span>
				</div>
				<div class="profile-stat">
					<div class="row">
						<div class="col-md-4 stat-item">
							{{$siswa->maple->count()}} <span>Mata Pelajaran</span>
						</div>
						<div class="col-md-4 stat-item">
							{{$siswa->rerata()}} <span>Nilai Rata-Rata</span>
						</div>
						<div class="col-md-4 stat-item">
							2174 <span>Points</span>
						</div>
					</div>
				</div>
			</div>
			<!-- END PROFILE HEADER -->

			<!-- PROFILE DETAIL -->
			<div class="profile-detail">
				<div class="profile-info">
					<h4 class="heading">Data Diri</h4>
					<ul class="list-unstyled list-justify">
						<li>Nama Depan <span>{{$siswa->nama_depan}}</span></li>
						<li>Nama Belakang <span>{{ $siswa->nama_belakang}}</span></li>
						<li>Jenis Kelamin <span>{{ $siswa->jenis_kelamin}}</span></li>
						<li>Agama <span>{{ $siswa->agama}}</span></li>
						<li>Alamat <span>{{ $siswa->alamat}}</span></li>
					</ul>
				</div>

				<div class="text-center"><a href="/siswa/{{$siswa->id}}" class="btn btn-warning">Edit Profile</a></div>
			</div>
			<!-- END PROFILE DETAIL -->
		</div>
		<!-- END LEFT COLUMN -->

		<!-- RIGHT COLUMN -->
		<div class="profile-right">
                    <button type="button"  data-toggle="modal"   data-target="#exampleModal" class="btn btn-primary">Tambah Nilai</button>
            <div class="panel">
                <!-- TABLE STRIPED --><div class="panel-heading">
                    <h3 class="panel-title">Mata Pelajaran</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>KODE</th>
                            <th>NAMA</th>
                            <th>SEMESTER</th>
                            <th>NILAI</th>
                            <th>GURU</th>
                            <th>Aksi</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($siswa->maple as $maple)
                            <tr>
                                <td>{{$maple->kode}}</td>
                                <td>{{$maple->nama}}</td>
                                <td>{{$maple->semester}}</td>
                                {{-- <td>{{$maple->pivot->nilai}}</td>--}}
                                <td><a href="#" class="nilaisiswa" data-type="text" data-pk="{{$maple->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Edite Nilai">{{$maple->pivot->nilai}}</a></td>
                                <td><a href="/guru/{{$siswa->guru_id}}/profile"></a> {{$maple->guru->nama}}</td>
                                <td><a href="/siswa/{{$siswa->id}}/{{$maple->id}}/deletenilai" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau di hapus?')">Delete</a></td>

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


<!-- Modal input nilai -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Nilai Mata Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/siswa/{{$siswa->id}}/addnilai" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{--mata pelajaran --}}
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Mata Pelajaran</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="maple">
                            @foreach ($matapelajaran as $mp)
                            <option value="{{$mp->id}}">{{$mp->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- nilai --}}
                    <div class="mb-3 form-group{{$errors->has('niali') ? '  has-error' : ''}}" >
                        <label for="nilai" class="form-label">Nilai</label>
                        <input name="nilai" type="text" placeholder="Input nilai" class="form-control" id="nilai" aria-describedby="emailHelp"
                               value="{{old('nilai')}}">
                        @if($errors->has('nilai'))
                            <span class="help-block">{{$errors->first('nilai')}}</span>
                        @endif
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end Modal input nilai -->
@endsection

@section('footer')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script>
        Highcharts.chart('chartNilai', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Laporan Nialai Siswa'
            },
            subtitle: {
                text: 'Source: SMP N 1 Gegesik'
            },
            xAxis: {
                categories: {!! json_encode($categories) !!},
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Nilai'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                // pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                //     '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Nilai',
                data: {!! json_encode($data) !!}

            }]
        });
        $(document).ready(function() {
            $('.nilaisiswa').editable();
        });
    </script>
@stop

