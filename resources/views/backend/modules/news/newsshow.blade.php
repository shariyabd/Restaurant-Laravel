@extends('backend.layouts.master')
@section('main-content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card p-3 shadow rounded">
                <div class="card-head d-flex">
                    <h3>Single Menu</h3>
                    <a href="{{route('backend.news.manage')}}" class="btn btn-primary ml-auto">Back</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Sl</th>
                            <td>{{$news->id}}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td><img width="50px" class="img img-fluid" src="{{asset('image/'.$news->file)}}" alt=""></td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td>{{$news->title}}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{$news->description}}</td>
                        </tr>
                        <tr>
                            <th>Second Tttle</th>
                            <td>{{$news->second_description}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{$news->status == 1 ? 'Publish' : 'Unpublish'}}</td>
                        </tr>
                    </table>
                    <button onclick="return (window.print())" class="btn btn-success w-100">Print</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection