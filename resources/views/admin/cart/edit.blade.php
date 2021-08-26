@extends('admin.layouts.master')

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

                        {!! Form::model($cart,array('class' => 'user','route'=>['cart.update', $cart->id] , 'method' => 'PATCH'))!!}
                        <div class="col-sm-8 mb-3 ">
                            <label for="title">Posts title</label>

                            {!! Form::text('item_name', $cart->item_name, array('required'=>'required','class'=> 'form-control'))!!}
                        </div>

                        <div class="col-sm-8 mb-3 ">
                            <label for="title">Posts title</label>

                            {!! Form::text('quantity', $cart->quantity, array('required'=>'required','class'=> 'form-control'))!!}
                        </div>

                        <div class="col-sm-8 mb-3 ">
                            <label for="title">Select categories</label>

                            {!! Form::select('category_id',$category,null,array('multiple','required'=>'required','class'=> 'form-control'))!!}
                        </div>

                        <div class="col-sm-8 mb-3">
                            <label for="title">Picture</label>
                            {!! Form::file('picture', array('class'=> 'form-control'))!!}
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
