@extends('admin.layouts.master');

@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create New Post</h6>
        </div>
        <div class="card-body">

            <div class="row">

                <div class="col-lg-12">
                    <div class="p-5">

                        {!! Form::model($user,array('class' => 'user','route'=>['users.update', $user->id] , 'method' => 'PATCH','enctype'=>'multipart/form-data'))!!}
                        <div class="col-sm-8 mb-3 ">
                            <label for="title">User Name</label>

                            {!! Form::text('name', null, array('required'=>'required', 'placeholder'=>'Posts title','class'=> 'form-control'))!!}
                        </div>

                        <div class="col-sm-8 mb-3 ">
                            <label for="title">Password</label>
                            {!! Form::password('password', null, array( 'placeholder'=>'Password','class'=> 'form-control'))!!}
                        </div>

                        <div class="col-sm-8 mb-3 ">
                            <label for="title">Role</label>

                            {!! Form::select('role_id', $roles,$roles, array('required'=>'required','class'=> 'form-control'))!!}
                        </div>

                        <div class="col-sm-8 mb-3">
                            <label for="title">Picture</label>
                            {!! Form::file('picture', array('class'=> 'form-control'))!!}
                        </div>

                        <div class="col-sm-8 mb-3">

                            {!! Form::text('email', null, array('required'=>'required', 'placeholder'=>'Email','class'=> 'form-control'))!!}
                        </div>

                    </div>


                    <button type="submit" class="btn btn-primary btn-create"> Update post</button>
                    <a class="btn btn-link float-right" href="{{ route('posts.index') }}">Go Back to List</a>
                    {!! Form::close() !!}


                </div>
            </div>
        </div>

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
