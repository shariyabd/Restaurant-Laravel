@extends('backend.layouts.master')
@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow p-3">
                    <div class="card-head text-center">
                        <h3>Edit News</h3>
                    </div>
                    <div class="card-body">
                        @if (Session::has('msg'))
                            <p class="alert alert-success">{{ Session::get('msg') }}</p>
                        @endif
                        <form method="post" action="{{route('backend.news.update', $news->id)}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" value="" name="file" id="file" placeholder="Upload News image">
                                <img class="img img-fluid" width="50px" src="{{asset('image/'.$news->file)}}" alt="">
                                <label for="file">News Image : </label>
                                @error('file')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" value="{{$news->title}}" class="form-control" name="title" id="title"
                                    placeholder="Title">
                                <label for="title">First Title : </label>
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <textarea name="description" id="description" class="form form-control" cols="30" rows="40">{{$news->description}}</textarea>
                                <label for="description">First Descripton. You Can't Give More Then 900 Characters</label>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" value="{{$news->second_title}}" class="form-control" name="second_title" id="second_title"
                                    placeholder="Second Title">
                                <label for="second_title">Second Title : </label>
                                @error('second_title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <textarea name="second_description" id="second_description" class="form form-control" cols="30" rows="5">{{$news->second_description}}</textarea>
                                <label for="second_description">Second Descripton. You Can't Give More Then 400 Characters.</label>
                                @error('second_description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <select name="category" id="category" class="form form-control">
                                    <option value="#">Select News Category</option>
                                    <option value="featured" {{$news->category === 'featured' ? 'selected' : '' }}>Featured</option>
                                    <option value="career" {{$news->category === 'career' ? 'selected' : '' }}>Career</option>
                                    <option value="meeting" {{$news->category === 'meeting' ? 'selected' : '' }}>Meeting</option>
                                    <option value="promotion" {{$news->category === 'promotion' ? 'selected' : '' }}>Promotion</option>
                                </select>
                              </div>
                              @error('category')
                              <p class="text-danger">{{ $message }}</p>
                              @enderror
                              <div class="form-floating mb-3">
                                <select name="status" id="status" class="form form-control">
                                    <option value="#">Select Status</option>
                                    <option value="1" {{ $news->status == 1 ? 'selected' : '' }}>Publish</option>
                                    <option value="0" {{ $news->status == 0 ? 'selected' : '' }}>Unpublish</option>
                                </select>
                              </div>
                              @error('status')
                              <p class="text-danger">{{ $message }}</p>
                              @enderror
                            
                            <div class="form-floating mb-3">
                                <button class="btn btn-success w-100" type="submit">Update News</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('msg'))
        {
        @push('js')
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: '{{ session('cls') }}',
                    toast: true,
                    title: '{{ session('msg') }}',
                    showConfirmButton: false,
                    timer: 2000
                })
            </script>
        @endpush
        }
    @endif
@endsection
