@extends('admin.layouts.master')

@section('content')


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Post List</h6>
        </div>
        <!--search bar-->
        <div class="card-header py-3 d-flex flex-row" >
            <div class="mx-auto d-flex flex-row">
            <h6 class="my-auto font-weight-bold text-info mr-2 ">Search articles</h6>
            <div class="ml-2 font-weight-bold text-primary">
                <form action="#" method="GET" class=" d-flex flex-row">
                    <input type="text" name="search" class="form-control" style="width:300px;" value="{{request('search')}}">
                    <button class="btn btn-danger ml-1">Search</button>
                </form>
            </div>
            </div>
        </div>
        <!--endsearchbar-->

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Date Created</th>
                        <th>Date Modified</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Date Created</th>
                        <th>Date Modified</th>
                        <th>Action</th>

                    </tr>
                    </tfoot>
                    <tbody class="body_cont">

                    @foreach ($posts as $post)


                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->user->id }} - {{ $post->user->name }} </td>
                            <td> {{ $post->created_at }}</td>
                            <td>{{ $post->updated_at }}</td>
                            <td>

                                <a class="border-0 btn-transition btn btn-outline-primary" href="{{ route('posts.edit',['post'=>$post->id]) }}"><i class="fa fa-pen-alt"></i></a>


                                {!! Form::open(['method' => 'DELETE', 'onsubmit' => 'return confirm("Are you sure you want to delete this?")', 'route' => ['posts.destroy', $post->id],'style'=>'display:inline']) !!}

                                {!! Form::hidden('id', $post->id, array('required'=>'required','placeholder' => '','class' => 'form-control')) !!}

                                {!! Form::button('<i class="fa fa-trash-alt"></i>', [ 'type' => "submit" , 'class' => 'border-0 btn-transition btn btn-outline-danger' , 'data-toggle'=>"tooltip" ,'data-placement'=>"top" ,'title'=>"", 'data-original-title'=>"Delete Post"]) !!}

                                {!! Form::close() !!}




                            </td>

                        </tr>

                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>


@endsection


@push('head')

    <!-- Custom styles for this page -->
    <link href="{{ asset('admin_assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endpush


@push('footer')

    <script src="{{ asset('admin_assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>


    <!-- Page level custom scripts -->
    <script src="{{ asset('admin_assets/js/demo/datatables-demo.js') }}"></script>



@endpush
