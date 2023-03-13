@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Thêm post <a class="btn btn-primary" href="{{ route('post.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('post.store') }}" method="post">
                @csrf
                Title : <input type="text" name="title" required> <br><br>
                Post :  <textarea name="posts" style="width: 100%;height: 100px;"></textarea>
                username : <input type="text" name="user_id" value= "{{ Session::get('id') }}"readonly>


                <button>Ok</button>
            </form>
        </div>
    </div>
@endsection
