@extends('layouts.master')
@section('title','Add Festival')
@section('content')
<div class="content-wrapper p-5">
    <section class="content" style="max-width:100%;">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="background: #F7F7F7;">
                            <h3 class="card-title">Festival Register</h3>
                        </div>

                        <form method="post" id="form" action="{{route('festival.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group px-2">
                                    <label for="company_id">Company</label>
                                    <select class="form-select form-select-lg form-control" name="company_id" id="company_id">
                                        @foreach($company as $item)
                                        <option value="{{$item->id}}">{{$item->company_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group px-2">
                                    <label for="theme_layout_id">Theme Layout</label>
                                    <select class="form-select form-select-lg form-control" name="theme_layout_id">
                                        @foreach($theme_layout as $item)
                                        <option value="{{$item->id}}">{{$item->theme}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group px-2">
                                    <label for="festival"> Festival</label>
                                    <input type="text" name="festival" id="festival" class="form-control" value="" placeholder="festival" required>
                                </div>
                                <div class="form-group px-2">
                                    <label for="image"> Image</label>
                                    <div class="form-group  form-control">
                                        <input type="file" name="image">
                                    </div>
                                </div>

                                <div class="form-group px-2">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" id="date" class="form-control" placeholder="Set Date">
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="form-group">
                                    <button type="submit" id="formsubmit" class="btn btn-primary float-right">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection