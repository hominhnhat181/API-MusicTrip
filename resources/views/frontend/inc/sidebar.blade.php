<div class="sidebar" data-color="purple" data-background-color="black" data-image="{{ asset('/assets/front/img/sidebar-2.jpg') }}">
    <img src="">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
    <div class="logo"><a href="{{Route('home')}}" class="simple-text logo-normal">
        Music Box
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ request()->is('/') ? 'active' : '' }}">
                <a class="nav-link" href="{{Route('home')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#">
                    <i class="material-icons">favorite</i>
                    <p>Likes</p>
                </a>
            </li>
            @if(Auth::check())
            <li class="{{ request()->is('library/'.Auth::user()->id) ? 'active' : '' }}">
                <a class="nav-link" href="{{Route('library',['user_id'=>Auth::user()->id])}}">
                    <i class="material-icons">library_music</i>
                    <p>Your Library</p>
                </a>
            </li>
            @else
            <li >
                <a class="nav-link" href="{{Route('login')}}">
                    <i class="material-icons">library_music</i>
                    <p>Your Library</p>
                </a>
            </li>
            @endif
            <li class="nav-item ">
                <a class="nav-link" href="#">
                    <i class="material-icons">toc</i>
                    <p>Create Playlist</p>
                </a>
            </li>
           <p id="mess">Add Library Success <i class="material-icons">label_important</i></p>
        </ul>
    </div>
</div>
