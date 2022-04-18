<div class="sidebar" data-color="orange" data-image="../assets/img/full-screen-image-3.jpg">
    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->
    <div class="logo">
    </div>

    <div class="sidebar-wrapper">
        <div class="user">
            <div class="info text-center">
                <span>
                    <font color="black">
                        <h5>
                            {{ session('name_users') }}
                        </h5>
                    </font>
                </span>
            </div>
        </div>
        <ul class="nav">
            @if (session('id_dpms') == '1')
                <li>
                    <a href="{{ route('users.index') }}">
                        <i class="pe-7s-users"></i>
                        <p>Danh sách người dùng</p>
                    </a>
                </li>
            @endif
            <li>
                <a href="{{ route('posts.index') }}">
                    <i class="pe-7s-smile"></i>
                    <p>Bài viết</p>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="pe-7s-piggy"></i>
                    <p>3</p>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="pe-7s-date"></i>
                    <p>4</p>
                </a>
            </li>
        </ul>
    </div>
</div>
