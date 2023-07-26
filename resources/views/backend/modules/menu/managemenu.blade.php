@extends('backend.layouts.master')
{{-- @section('page-title', 'Manage Menu') --}}
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3 shadow rounded">
                    <div class="card-head d-flex">
                        <h3>Manage Menu</h3>
                        <a href="{{ route('backend.menu.add') }}" class="btn btn-primary ml-auto">Add Menu</a>
                    </div>
                    @if (Session::has('msg'))
                        <p class="alert alert-success">{{ Session::get('msg') }} </p>
                    @endif
                </div>
                <div class="card-body text-center">
                    <table class="table table-bordered shadow-sm p-3">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Food Name</th>
                                <th>Price</th>
                                <th>Review</th>
                                <th>Category</th>
                                <th>Food Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($menus as $menu)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $menu->food_name }}</td>
                                    <td>{{ $menu->price }}</td>
                                    <td>{{ $menu->review }}</td>
                                    <td>{{ $menu->category }}</td>
                                    <td><img class="img img-fluid rounded" width="150px"
                                            src="{{ asset('image/' . $menu->file) }}" alt=""></td>
                                    <td><span
                                            class="badge {{ $menu->status == 1 ? 'badge-success' : 'badge-dark' }}">{{ $menu->status == 1 ? 'Publish' : 'Unpublish' }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('backend.menu.edit', $menu->id) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('backend.menu.show', $menu->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                            {{-- <a href="{{ route('backend.menu.delete', $menu->id) }}"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> --}}
                                            <form method="post" id="form_{{ $menu->id }}" action="{{ route('backend.menu.delete', $menu->id) }}">
                                                @csrf
                                                <button class="delete btn btn-danger btn-sm" type="submit" data-id = {{$menu->id}} ><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $menus->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
<script>
    $(document).ready(function() {
        $('.delete').on('click', function(event) {
            event.preventDefault(); // Prevent the default form submission

            let id = $(this).attr('data-id');
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form_' + id).submit(); // Submit the form if confirmed
                }
            });
        });
    });
</script>
@endpush

@endsection
