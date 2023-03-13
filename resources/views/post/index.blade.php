@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2> bài viết <a class="btn btn-success" href="{{ route('post.create') }}"> Thêm mới</a></h2>
                        </h2>
                    </div>
                </div>
            </div>


            <table class="table ">

                @foreach ($post as $item)
        <tbody>
        <tr>
            <td>

               <h3>tác giả: {{$item->name}}</h3>
             <h2>Tiêu đề:{{$item->title}}</h2>
                <h4>Nội dung <br>{{$item->post}}</h4>

                <form action="{{ route('post.destroy', $item->id_post)}}"  method="post">
                    <a class="btn btn-primary" href="{{ route('post.edit', $item ->id_post) }}"><i class="fa fa-pencil"></i></a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </form>
            </td>



                </tr>
                <hr>
            </tbody>
                @endforeach
            </table>
            {{$post->appends([

            ])->links()}}
        </div>
    </div>
@endsection
