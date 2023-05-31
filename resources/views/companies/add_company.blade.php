@extends('layouts.master')
@section('title','Add Company')
@section('content')
<div class="content-wrapper p-5">
    <section class="content">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Company Register</h3>
                        </div>
                        <form method="post" id="form" action="{{route('company.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <label for="theme_layout_id">Theme Layout</label>
                                    <select class="form-select form-select-lg form-control" name="theme_layout_id" id="theme_layout_id">
                                        @foreach($theme_layout as $item)
                                        <option value="{{$item->id}}">{{$item->theme}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row">
                                    <label for="company_name">Company </label>
                                    <input type="text" name="company_name" id="company_name" class="form-control" value="" placeholder="company_name" required>
                                </div>
                                <div class="row">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" name="address" id="address" placeholder="Company Address"></textarea>
                                    <!-- <input type="text" name="company_name" id="company_name" class="form-control" value="" placeholder="company_name" required> -->
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" id="formsubmit" class="btn btn-primary float-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection