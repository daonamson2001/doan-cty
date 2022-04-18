<div style="width:600px; margin:0 auto;">
    <div style="text-align: center">
        <h2>
            Xin chào {{ $users->name_users }}
        </h2>
        <p>
            Bạn đã đang ký tài khoản tại hệ thống của chúng tôi
        </p>
        <p>
            Để có thể tiếp tục sử dụng tài khoản cho các dịch vụ bạn vui lòng nhấn vào nút kích hoạt phía bên dưới
        </p>
        <a href="{{ route('actived', ['token' => $users->token, 'id' => $users->id]) }}"
            style="display:inline-block; background:green;color:#fff;padding:7px 25px; font-weight:bold;">Kích hoạt tài
            khoản</a>
    </div>
</div>
