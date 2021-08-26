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

                        {!! Form::open(['class' => 'user','route'=>'posts.store' , 'method' => 'post'])!!}
                        <div class="col-sm-8 mb-3 ">
                          <label for="title">Posts title</label>

                        {!! Form::text('title', null, array('required'=>'required', 'placeholder'=>'Posts title','class'=> 'form-control'))!!}
                        </div>

                        <div class="col-sm-8 mb-3 ">
                            <label for="title">Author</label>

                            {!! Form::select('user_id',$users, null,array('required'=>'required','class'=> 'form-control'))!!}
                        </div>
                        <!--Select for category Id-->
                        <div class="col-sm-8 mb-3 ">
                            <label for="title">Category</label>

                            {!! Form::select('category_id[]',$categories,null,array('multiple','required'=>'required','class'=> 'form-control'))!!}
                        </div>

                                <div class="col-sm-8 mb-3">
                                    <label for="excerpt">Excerpt</label>
                                    {!! Form::textarea('excerpt', null, array('raws'=>'5', 'id'=>'excerpt','class'=> 'form-control'))!!}

                                </div>

                                <div class="col-sm-8 mb-3 ">
                                    <label for="content">Content</label>
                                    {!! Form::textarea('content', null, array('raws'=>'10', 'id'=>'editor','class'=> 'form-control'))!!}

                                </div>
                            </div>


                             <button type="submit" class="btn btn-primary btn-create"> Create New</button>
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
