@extends('backend.layouts.master')
@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow p-3">
                <div class="card-head text-center">
                    <h3>Update Menu</h3>
                </div>
                <div class="card-body">
                    @if(Session::has('msg'))
                    <p class="alert alert-success">{{Session::get('msg')}}</p>
                    @endif
                    <form method="post" action="{{route('backend.menu.update', $menu->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" value="{{$menu->food_name}}" class="form-control" name="food_name" id="food_name" placeholder="Morning Fresh">
                            <label for="food_name">Food Name : </label>
                            @error('food_name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                          </div>
                          <div class="form-floating mb-3">
                            <input type="file" class="form-control" name="file" id="file" placeholder="upload food image">
                           <img class="img img-fluid" width="50px" src="{{asset('image/'.$menu->file)}}" alt="">
                            <label for="file">Food Image : </label>
                            @error('file')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                          </div>
                          <div class="form-floating mb-3">
                            <input type="text" value="{{$menu->price}}" class="form-control" name="price" id="price" placeholder="Food Price">
                            <label for="price">Food Price : </label>
                            @error('price')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                          </div>
                          <div class="form-floating mb-3">
                            <input type="text" value="{{$menu->review}}" class="form-control" name="review" id="review" placeholder="Food rating">
                            <label for="review">Food rating : </label>
                            @error('review')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                          </div>
                          <div class="form-floating mb-3">
                            <select name="category" id="category" class="form form-control">
                                <option value="#">Select Menu Category</option>
                                <option value="breakfast" {{ $menu->category === 'breakfast' ? 'selected' : '' }}>Breakfast</option>
                                <option value="dinner" {{ $menu->category === 'dinner' ? 'selected' : '' }}>Dinner</option>
                                <option value="launch" {{ $menu->category === 'launch' ? 'selected' : '' }}>Launch</option>
                            </select>
                          </div>
                          @error('category')
                          <p class="text-danger">{{ $message }}</p>
                          @enderror
                          <div class="form-floating mb-3">
                            <select name="status" id="status" class="form form-control">
                                <option value="#">Select Status</option>
                                <option value="1" {{ $menu->status == 1 ? 'selected' : '' }}>Publish</option>
                                <option value="0" {{ $menu->status == 0 ? 'selected' : '' }}>Unpublish</option>
                            </select>
                          </div>
                          @error('status')
                          <p class="text-danger">{{ $message }}</p>
                          @enderror
                          <div class="form-floating mb-3">
                            <button class="btn btn-success w-100" type="submit">Update Menu</button>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('msg')){
  @push('js')
  <script>
Swal.fire({
  position: 'top-end',
  icon: '{{session('cls')}}',
  toast: true,
  title: '{{session('msg')}}',
  showConfirmButton: false,
  timer: 2000
})
  </script>
@endpush
}
@endif

@endsection