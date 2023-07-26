@extends('backend.layouts.master')
@section('main-content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card p-3 shadow rounded">
                <div class="card-head d-flex">
                    <h3>Single Menu</h3>
                    <a href="{{route('backend.menu.manage')}}" class="btn btn-primary ml-auto">Back</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Sl</th>
                            <td>{{$menu->id}}</td>
                        </tr>
                        <tr>
                            <th>Food Name</th>
                            <td>{{$menu->food_name}}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{$menu->price}}</td>
                        </tr>
                        <tr>
                            <th>Review</th>
                            <td>{{$menu->review}}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>Food Image</th>
                            <td><img width="50px" class="img img-fluid" src="{{asset('image/'.$menu->file)}}" alt=""></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{$menu->status == 1 ? 'Publish' : 'Unpublish'}}</td>
                        </tr>
                    </table>
                    <button onclick="return (window.print())" class="btn btn-success w-100">Print</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection