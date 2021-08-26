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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Item Picture</th>
                        <th>Title</th>
                        <th>Category Name</th>
                        <th>Quantity</th>
                        <th>Date Created</th>
                        <th>Date Modified</th>
                        <th>Action</th>

                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Item Picture</th>
                        <th>Item name</th>
                        <th>Category Name</th>
                        <th>Quantity</th>
                        <th>Date Created</th>
                        <th>Date Modified</th>
                        <th>Action</th>

                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($cart_items as $cart)
                        <tr id = "cart_row_{{$cart->id}}">
                            <th>{{ $cart->id }}</th>
                            @if($cart->picture)
                            <th><img src="{{Storage::url($cart->picture)}}" alt="" width="50px"></th>
                            @endif
                            <th>{{ $cart->item_name }}</th>
                            <th>{{$cart->cartcategory->category_name}}</th>
                            <th>{{ $cart->quantity }}</th>
                            <th>{{ $cart->created_at }}</th>
                            <th>{{ $cart->updated_at }}</th>
                            <th>
                                <a class="border-0 btn-transition btn btn-outline-primary" href="{{ route('cart.edit',['cart'=>$cart->id]) }}"><i class="fa fa-pen-alt"></i></a>

                                <a class="border-0 btn-transition btn btn-outline-danger btn-delete-cart" data-cart-id="{{$cart->id}}" href="{{route('cart.destroy',['cart'=>$cart->id])}}"><i class="fa fa-trash-alt"></i></a>

                               {{-- {!! Form::open(['method' => 'DELETE', 'onsubmit' => 'return confirm("Are you sure you want to delete this?")', 'route' => ['cart.destroy', $cart->id],'style'=>'display:inline']) !!}

                                {!! Form::hidden('id', $cart->id, array('required'=>'required','placeholder' => '','class' => 'form-control')) !!}

                                {!! Form::button('<i class="fa fa-trash-alt"></i>', [ 'type' => "submit" , 'class' => 'border-0 btn-transition btn btn-outline-danger' , 'data-toggle'=>"tooltip" ,'data-placement'=>"top" ,'title'=>"", 'data-original-title'=>"Delete Post"]) !!}

                                {!! Form::close() !!}</th>--}}

                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
        <script src="{{ asset('admin_assets/js/cart.js') }}"></script>
@endpush
