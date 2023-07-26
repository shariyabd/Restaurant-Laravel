@extends('backend.layouts.master')
@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow p-3">
                    <div class="card-head text-center">
                        <h3>Edit Members</h3>
                    </div>
                    <div class="card-body">
                        @if (Session::has('msg'))
                            <p class="alert alert-success">{{ Session::get('msg') }}</p>
                        @endif
                        <form method="post" action="{{route('backend.member.update', $member->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" name="file" id="file"
                                    placeholder="upload food image">
                                    <img class="img img-fluid" width="50px" src="{{asset('image/'.$member->file)}}" alt="">
                                <label for="file">Member Image : </label>
                                @error('file')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" id="name" value="{{$member->name}}"
                                    placeholder="Food Price">
                                <label for="name">Member Name : </label>
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="role" id="role" value="{{$member->role}}"
                                    placeholder="Food rating">
                                <label for="role">Member Role : </label>
                                @error('role')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            @error('category')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="form-floating mb-3">
                                <select name="status" id="status" class="form form-control">
                                    <option value="#">Select Status</option>
                                    <option value="1" {{$member->status == 1 ? 'selected' : ''}} >Publish</option>
                                    <option value="0"  {{$member->status == 0 ? 'selected' : ''}} >Unpublish</option>
                                </select>
                            </div>
                            @error('status')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="form-floating mb-3">
                                <button class="btn btn-success w-100" type="submit">Update Member</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
