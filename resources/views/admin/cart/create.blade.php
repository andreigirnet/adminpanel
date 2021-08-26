@extends('admin.layouts.master')
@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create new Item</h6>
        </div>
        <div class="card-body">

            <div class="row">

                <div class="col-lg-12">
                    <div class="p-5">

                        {!! Form::open(['class' => 'user','route'=>'cart.store' , 'method' => 'post', 'enctype'=>'multipart/form-data'])!!}
                        <div class="col-sm-8 mb-3 ">
                            <label for="item_name">Item name</label>
                            {{Form::text('item_name',null,array('class'=>'form-control','required'=>'required','placeholder'=>'Item name'))}}
                        </div>

                        <div class="col-sm-8 mb-3 ">
                            <label for="quantity">Quantity</label>
                            {{Form::text('quantity', null, array('class'=>'form-control','required'=>'required','placeholder'=>'Quantity'))}}
                        </div>

                        <div class="col-sm-8 mb-3 ">
                            <label for="title">Select categories</label>

                            {!! Form::select('category_id',$category,null,array('multiple','required'=>'required','class'=> 'form-control'))!!}
                        </div>

                        <div class="col-sm-8 mb-3">
                            <label for="title">Picture</label>
                            {!! Form::file('image', array('class'=> 'form-control'))!!}
                        </div>

                        <button type="submit" class="btn btn-primary btn-create"> Create New</button>

                    </div>

                    <a class="btn btn-secondry float-right" href="{{ route('posts.index') }}">Go Back to List</a>
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
