@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2> bài viết chưa duyệt
                        </h2>
                    </div>
                </div>
            </div>


            <table class="table ">

                @foreach ($post as $item)
        <tbody>
        <tr>
            <td>
                <form action="{{ route('admin.update', $item->id_post) }}" method="post">
                    @method('PUT')
                    @csrf

               <h3>tác giả: {{$item->name}}</h3>
                <h2>Tiêu đề:{{$item->title}}</h2>
                <h4>Nội dung <br>{{$item->post}}</h4>

                    <button>Duyệt bài</button>
                </form>


                {{-- <a onClick="return processed()" class="btn btn-success" href="{{ route('admin.edit', $item ->id_post) }}" role="button">Xử lý</a> --}}
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
