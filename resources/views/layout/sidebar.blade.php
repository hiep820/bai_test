<div class="sidebar" data-color="blue" data-image="{{ asset('assets') }}/img/full-screen-image-3.jpg">
    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    <div class="logo">
        <a href="#" class="simple-text logo-mini">
            Ct
        </a>

        <a href="#" class="simple-text logo-normal">
            BKA
        </a>
    </div>
    <div class="sidebar-wrapper">

        <ul class="nav">


            <li>
                <a href="{{ route('post.index') }}">
                    <i class="pe-7s-id"></i>
                    <p>Bài post</p>
                </a>
            </li>
            @if (Session::get('level'))

               <li>
                <a href="{{ route('admin.index') }}">
                    <i class="pe-7s-albums"></i>
                    <p>Duyệt Post</p>
                </a>
            </li>
            @endif

        </ul>
    </div>
</div>
