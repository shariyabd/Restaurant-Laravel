@extends('backend.layouts.master')
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3 shadow rounded">
                    <div class="card-head d-flex">
                        <h3>Manage Member</h3>
                        <a href="{{route('backend.member.create')}}" class="btn btn-primary ml-auto">Add Member</a>
                    </div>
                    {{-- @if (Session::has('msg'))
                        <p class="alert alert-success">{{ Session::get('msg') }} </p>
                    @endif --}}
                </div>
                <div class="card-body text-center">
                    <table class="table table-bordered shadow-sm p-3">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $member)                
                           <tr>
                            <td>1</td>
                              <td><img class="img img-fluid rounded" width="150px"
                                src="{{ asset('image/' . $member->file) }}" alt=""></td>
                            <td>{{$member->name}}</td>
                            <td>{{$member->role}}</td>
                            <td> <span class="badge {{$member->status == 1 ? 'badge-success' : 'badge-dark'}}">{{$member->status == 1 ? 'Publish' : 'Unpublish'}}</span></td>
                            <td>
                                <a href="{{ route('backend.member.edit', $member->id) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('backend.member.show', $member->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                {{-- <a href="{{ route('backend.menu.delete', $menu->id) }}"
                                class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> --}}
                                <form method="post" id="form_{{ $member->id }}" action="{{ route('backend.member.delete', $member->id) }}">
                                    @csrf
                                    <button class="delete btn btn-danger btn-sm" type="submit" data-id = {{$member->id}} ><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                           </tr>
                           @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{-- {{ $menus->links() }} --}}
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
