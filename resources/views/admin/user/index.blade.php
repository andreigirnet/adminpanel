@extends('admin.layouts.master')

@section('content')




    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
                                                                   href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableone" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>UserId</th>
                        <th>UserAvatar</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>UserId</th>
                        <th>UserAvatar</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>

                    <tbody>


                    @foreach($users as $user)
                        <tr id="user_row_{{$user->id}}">
                            <th>{{$user->id}}</th>
                            <th>
                                @if($user->picture)
                                <img src="{{Storage::url($user->picture)}}" alt="" width="50px">
                                @endif
                            </th>
                            <th>{{$user->name}}</th>
                            @if(isset($user->role->role_name))
                            <th>{{$user->role->role_name}}</th>
                            @else
                                <th>No role</th>
                            @endif
                            <th>{{$user->created_at}}</th>
                            <th>{{$user->updated_at}}</th>
                            <th>
                                <a class="border-0 btn-transition btn btn-outline-primary" href="{{ route('users.edit',['user'=>$user->id]) }}"><i class="fa fa-pen-alt"></i></a>
                                <a class="border-0 btn-transition btn btn-outline-danger btn-delete-user" data-user-id="{{$user->id}}" href="{{route('users.destroy',['user'=>$user->id])}}"><i class="fa fa-trash-alt"></i></a>

{{--                                {!! Form::open(['method' => 'DELETE', 'onsubmit' => 'return confirm("Are you sure you want to delete this?")', 'route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}--}}

{{--                                {!! Form::hidden('id', $user->id, array('required'=>'required','placeholder' => '','class' => 'form-control')) !!}--}}

{{--                                {!! Form::button('<i class="fa fa-trash-alt"></i>', [ 'type' => "submit" , 'class' => 'border-0 btn-transition btn btn-outline-danger' , 'data-toggle'=>"tooltip" ,'data-placement'=>"top" ,'title'=>"", 'data-original-title'=>"Delete Post"]) !!}--}}

{{--                                {!! Form::close() !!}--}}
                            </th>


                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    <div class="">
    {{$users->links()}}
    </div>

    @endsection

    @push('head')
        <!-- Custom styles for this page -->
            <link href="{{asset('admin_assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    @endpush

    @push('footer')
        <!-- Page level plugins -->
            <script src="{{ asset('admin_assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
            <!-- Page level custom scripts -->
            <script src="{{ asset('admin_assets/js/demo/datatables-demo.js') }}"></script>
    @endpush


