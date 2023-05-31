@extends('layouts.master')
@section('title','Festival list')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid ">
            <div class="row ">
                <div class="col-6">
                    <h1>Festival</h1>
                </div>
                <div class="col-6">
                    <div class="header ">
                        <a href="{{route('festival.create')}}" class="btn btn-success float-right py-2 m-2" role="button">Add New Festival</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class=" p-3">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Festival List</h3>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 container">
                        <table class="table table-striped" id="tbl">
                            <tr>
                                <th>id</th>
                                <th>Festival</th>
                                <th>Company Id</th>
                                <!-- <th>Theme</th> -->
                                <th>Image</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            @foreach($festival as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->festival}}</td>
                                <td>{{$item->company->company_name}}</td>
                                <td><img height="40px" width="40px" src="{{asset('asset/img/'.$item->image)}}"></td>
                                <td>{!! date('d-M-Y', strtotime($item->date)) !!}</td>
                                <td>
                                    <a href="{{ route('festival.edit',$item->id) }}" class="btn btn-info" role="button"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger" role="button" href="javascript:void(0)" id="festival_delete" data-id="{{$item->id}}" data-token="{{ csrf_token() }}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection