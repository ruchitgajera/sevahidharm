@extends('layouts.frontend')
@section('title','Festival List')
@section('content')

@php
$path = 'asset/img/background1.webp';
@endphp

<style>
    img {
        /* border: 1px solid #000000; */
        border-radius: 6px;
        padding: 5px;
        width: 230px;
    }

    img:hover {
        box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
    }
</style>

<body class="content-wrapper text-white" style="background-image:url('{{asset($path)}}');background-repeat: no-repeat;background-size: cover;">
    <div class="p-5">
        <section class="product-area section-space">
            <div class="container">
                <div class="row ">
                    @foreach($festival as $item)
                    <div class="product-item col-12 col-sm-6 col-md-3 p-3">
                        <div class="card text-white bg-dark" style="width: 231px;">
                            <a class="product-thumb" href="{{route('create',$item->slug)}}">
                                <img src="{{asset('asset/img/'.$item->image)}}" style="width: 230px;">
                            </a>
                            <div class="card-body">
                                <h5 class="title d-flex justify-content-center"><a href="{{route('create',$item->slug)}}" class="text-white">{{$item->festival}}</a></h5>
                                <p class="title d-flex justify-content-center font-italic">{!! date('d-M-Y', strtotime($item->date)) !!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

</body>
@endsection