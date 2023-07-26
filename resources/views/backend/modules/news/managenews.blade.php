@extends('backend.layouts.master')
{{-- @section('page-title', 'Manage Menu') --}}
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3 shadow rounded">
                    <div class="card-head d-flex">
                        <h3>Manage News</h3>
                        <a href="{{ route('backend.news.add') }}" class="btn btn-primary ml-auto">Add News</a>
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
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Second Title</th>
                                <th>Second Description</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($news as $data)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><img class="img img-fluid rounded" width="150px" src="{{ asset('image/' . $data->file) }}" alt=""></td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->description }}</td>
                                    <td>{{ $data->second_title }}</td>
                                    <td>{{ $data->second_description }}</td>
                                    <td>{{ $data->category}}</td>
                                    <td><span
                                        class="badge {{ $data->status == 1 ? 'badge-success' : 'badge-dark' }}">{{ $data->status == 1 ? 'Publish' : 'Unpublish' }}</span>
                                </td>
                                     <td>
                                        <div class="d-flex">
                                            <a href="{{route('backend.news.edit', $data->id)}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="{{route('backend.news.show', $data->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                           {{-- <a href="{{ route('backend.news.delete', $menu->id) }}"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>  --}}
                                            <form method="post" id="form_{{ $data->id }}" action="{{ route('backend.news.delete', $data->id) }}">
                                                @csrf
                                                <button class="delete btn btn-danger btn-sm" type="submit" data-id = {{$data->id}} ><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{-- {{ $news->links() }} --}}
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
                    $('#form_'+id).submit(); // Submit the form if confirmed
                }
            });
        });
    });
</script>
@endpush

@endsection
