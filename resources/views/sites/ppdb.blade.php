@extends('sites.masterpage')

@section('content')

    <!-- section -->
    <div class="section layout_padding padding_bottom-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_center">
                            <h2><span>Registrasi PPDB </span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
    <!-- section -->
    <div class="section contact_section" style="background:#12385b;">
        <div class="container">
            <div class="row">
                <div class="layout_padding col-lg-6 col-md-6 col-sm-12">
                    <div class="full float-right_img">
                        <img src="{{asset('front/images/img10.png')}}" alt="#">
                        Come and Joins Us
                    </div>
                </div>
                <div class="layout_padding col-lg-6 col-md-6 col-sm-12">
                    <div class="contact_form">
                        {{ Form::open(['url' => 'postregister']) }}

                            <fieldset>
                                <div class="full field">
                                    {{ Form::text('nama_depan','',['class'=>'form-control','placeholder'=>'Nama Depan']) }}
                                </div>
                                <div class="full field">
                                    {{ Form::text('nama_belakang','',['class'=>'form-control','placeholder'=>'Nama Belakang']) }}
                                </div>
                                <div class="full field">
                                    {{ Form::text('agama','',['class'=>'form-control','placeholder'=>'Agama']) }}
                                </div>
                                <div class="full field">
                                    {{ Form::email('email','',['class'=>'form-control','placeholder'=>'Email']) }}
                                </div>
                                <div class="full field">
                                    {{ Form::select('jenis_kelamin',['L'=>'Laki-Laki','P'=>'Perempuan'],['class'=>'form-control']) }}
                                </div>
                                <div class="full field">
                                    {{ Form::textarea('alamat','',['class'=>'form-control','placeholder'=>'Alamat Lengkap']) }}
                                </div>
                                <div class="full field">
                                    {{ Form::password('password',['class'=>'form-control','placeholder'=>'Password']) }}
                                </div>
                                <div class="full field">

                                    <div class="center"><input type="submit" class="btn btn-primary"  value="Register"></div>
                                </div>
                            </fieldset>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
