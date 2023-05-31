@extends('layouts.master')
@section('title','User List')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid ">
            <div class="row ">
                <div class="col-12">
                    <h1>User</h1>
                </div>

            </div>
        </div>
    </section>
    <div class=" p-3">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">User List</h3>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 container">
                        <table class="table table-striped" id="tbl">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Number</th>
                                <th>Address</th>
                                <th>Delete</th>
                            </tr>
                            @foreach($holiday as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->number}}</td>
                                <td>{{$item->address}}</td>
                                <td>
                                    <a class="btn btn-danger" role="button" href="javascript:void(0)" id="user_delete" data-id="{{$item->id}}" data-token="{{ csrf_token() }}"><i class="fa fa-trash"></i></a>
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