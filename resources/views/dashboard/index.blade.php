@extends('layouts.master')
@section('content')



                    <div class="panel">


                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-user-circle"></i></span>
                                        <p>
                                            <span>Jumalah Murid</span>
                                            <br>
                                            <span>{{jumlahMurid()}}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-graduation-cap"></i></span>
                                        <p>
                                            <span>Jumalah Guru</span>
                                            <br>
                                            <span>{{jumlahGuru()}}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <h2>Peringkat 5 Besar Kelas VII</h2>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>NIS</th>
                                    <th>NAMA</th>
                                    <th>NILAI RATA-RATA</th>
                                    <th>RANKING</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $ranking=1;
                                    @endphp

                                    @foreach(peringkat5() as $sw)
                                        <tr>
                                            <td>{{$sw->id}}</td>
                                            <td>{{$sw->nama_lengkap()}}</td>
                                            <td>{{$sw->rata2nilai}}</td>
                                            <td>{{$ranking}}</td>
                                        </tr>
                                        @php
                                            $ranking++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>





@endsection
