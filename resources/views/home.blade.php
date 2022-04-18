@extends('layouts.layout')
@section('main')
    <div class="main-content">
        <div class="card">
            <div class="header"></div>
            <div class="content">
                <h3>Đây là trang chủ</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            Biểu đồ dạng cột
                            <p class="category">Giá trị bitcoin theo chu kì</p>
                        </div>
                        <div class="content">
                            <div id="chartActivity" class="ct-chart "></div>
                        </div>
                        {{-- <h1>Sales Graphs</h1>

                        <div style="width: 50%">
                            {!! $salesChart->container() !!}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
