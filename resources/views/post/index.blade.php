@extends('layouts.layout')
@section('main')
    <style>
        .content {
            position: relative;
        }

        hr {
            display: block;
            margin-top: 0.5em;
            margin-bottom: 0.5em;
            width: 70%;
            border-style: inset;
            border-width: 1px;
        }

    </style>
    <div class="main-content">
        <center>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </center>
        <h2>Bài viết đi cùng năm tháng</h2>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="content">
                            @foreach ($data as $items)
                                <p style="font-size: 16px;">Người đăng: <i>{{ $items->name_users }}</i>&emsp;
                                    <span style="font-size:15px;">Tiêu đề: {{ $items->title_posts }}</span>&emsp;
                                    <span style="font-size:12px;">Lúc:
                                        {{ $items->created_at_time_posts }}</span>
                                </p>
                                <p style="font-size:19px;position: relative;
                                        right: -35px">{{ $items->content_posts }}</p>
                                <br />
                                <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
