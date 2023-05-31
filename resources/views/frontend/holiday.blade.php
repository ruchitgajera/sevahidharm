@extends('layouts.frontend')
@section('title','Holiday')
@section('content')

@php
$path = 'asset/img/background.jpg';
@endphp

<body class="content-wrapper text-white" style="background-image:url('{{asset($path)}}');background-repeat: no-repeat;background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="py-0 text-center">
                    <h2 style="background: #FFA07A" class=" rounded text-light pb-2 pt-2">Seva Hi Dharm Post</h2>
                </div>
                <div class="row">
                    <div class="col-md-2 order-md-3 mb-4"> </div>
                    <div class="col-md-2 order-md-1 mb-4"></div>
                    <div class="col-md-8 order-md-2">
                        <form method="post" id="form" action="{{route('save_data',$festival->slug)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3 offset-md-3">
                                    <label class="form-label">Select Your Photo</label>
                                    <div class="imageUploader">
                                        <div class="user_pic_container_box">
                                            <img data-width="300" data-height="300" class="user_pic_container" style="border-radius: 25px" src="{{asset('asset/img/avatar5.png')}}" />
                                        </div>
                                        <a class="imgremovebtn" href="#">X</a>
                                        <input readonly style="display: none" id='file_browse' type="file" accept="image/*">
                                        <input type="hidden" name="image" class="value_container @error('image') is-invalid @enderror" value="nochange" />
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3 offset-md-3">
                                    <label for="name">Name / Email / Website</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter Yor Email / Website">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3 offset-md-3">
                                    <label for="number">Your Number</label>
                                    <input type="text" class="form-control" name="number" id="number" autocomplete="number" placeholder="Enter Yor number">
                                   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3 offset-md-3">
                                    <label for="address">Address</label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" placeholder="Enter Yor Address"></textarea>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="row">
                                <div class="col-md-6 mb-4 offset-md-3">
                                    <button type="submit" onclick="gtag('event', 'selfie-1', {'event-category': 'selfie' ,'event_label': 'Selfie' });" class="btn btn-lg btn-block" style="background-color: #FFA07A;">Download</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr class="mb-1 mt-4">
            </div>
        </div>
       
    </div>
</body>
@endsection