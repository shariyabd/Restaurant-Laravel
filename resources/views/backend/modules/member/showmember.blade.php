@extends('backend.layouts.master')
@section('main-content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card p-3 shadow rounded">
                <div class="card-head d-flex">
                    <h3>Single Member</h3>
                    <a href="{{route('backend.member.manage')}}" class="btn btn-primary ml-auto">Back</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Sl</th>
                            <td>{{$member->id}}</td>
                        </tr>
                        <tr>
                            <th>Member Name</th>
                            <td>{{$member->name}}</td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td>{{$member->role}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{$member->status == 1 ? 'Publish' : 'Unpublish'}}</td>
                        </tr>
                        <tr>
                            <th>Member Image</th>
                            <td><img width="50px" class="img img-fluid" src="{{asset('image/'.$member->file)}}" alt=""></td>
                        </tr>

                    </table>
                    <button onclick="return (window.print())" class="btn btn-success w-100">Print</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection