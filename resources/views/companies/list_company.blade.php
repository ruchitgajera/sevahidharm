@extends('layouts.master')
@section('title','Company List')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid ">
            <div class="row ">
                <div class="col-6">
                    <h1>Company</h1>
                </div>
                <div class="col-6">
                    <div class="header ">
                        <a href="{{route('company.create')}}" class="btn btn-success float-right py-2 m-2" role="button">Add New Company</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class=" p-3">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Company List</h3>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 container">
                        <table class="table table-striped" id="tbl">
                            <tr>
                                <th>Id</th>
                                <th>Company Name</th>
                                <th>Theme</th>
                                <th>Layout</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            @foreach($company as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->company_name}}</td>
                                <td>{{$item->theme_layout->theme}}</td>
                                <td>{{$item->theme_layout->layout}}</td>
                                <td>{{$item->address}}</td>
                                <td>
                                    <a href="{{ route('company.edit',$item->id) }}" class="btn btn-info" role="button"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger" role="button" href="javascript:void(0)" id="company_delete" data-id="{{$item->id}}" data-token="{{ csrf_token() }}"><i class="fa fa-trash"></i></a>

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