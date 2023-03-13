@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Cập nhật phòng <a class="btn btn-primary" href="{{ route('post.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('post.update', $post->id_post) }}" method="post">
                @method('PUT')
                @csrf


              Title: <input type="text" name="title" value="{{ $post->title}}" ><br>

                Post : <textarea name="posts" style="width: 100%;height: 100px;" >{{ $post->post }}</textarea> <br>

                <button>Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
