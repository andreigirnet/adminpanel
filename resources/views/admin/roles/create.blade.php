@extends('admin.layouts.master');

@section('content')

    <!-- DataTales Example -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Create New Role</h6>
    </div>
    <div class="card-body">

        <div class="row">

            <div class="col-lg-12">
                <div class="p-5">

                    {!! Form::open(['class' => 'user','route'=>'roles.store' , 'method' => 'post'])!!}
                    <div class="col-sm-8 mb-3 ">
                        <label for="title">Role Title</label>

                        {!! Form::text('role_name', null, array('required'=>'required', 'placeholder'=>'Role title','class'=> 'form-control'))!!}
                    </div>

                <!--Select for category Id-->
                <div class="col-sm-8 mb-3 ">
                    <label for="title">Select permissions</label>

                    {!! Form::select('permission_id[]',$permissions,null,array('multiple','required'=>'required','class'=> 'form-control'))!!}
                </div>
            </div>
                <button type="submit" class="btn btn-primary btn-create"> Create New</button>
                <a class="btn btn-secondry float-right" href="{{ route('roles.index') }}">Go Back to List</a>
                {!! Form::close() !!}

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
