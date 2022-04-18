@extends('layouts.layout')
@section('main')
    <div class="main-content">
        <center>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                        {{ $err }}
                    @endforeach
                </div>
            @endif
            @if (session('alert'))
                <div class="alert alert-danger">
                    {{ session('alert') }}
                </div>
            @endif

        </center>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if (session('id_dpms') == 1 || session('id') == 1 or session('id') == $item->id)
                            <div class="header">Thông tin người dùng</div>
                            <div class="content">
                                <form class="form-horizontal" action="{{ route('users.update', [$item->id]) }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Mã người dùng</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" readonly name="id"
                                                value="{{ $item->id }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Tên người dùng</label>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="Nhập tên" class="form-control"
                                                name="name_users" required value="{{ $item->name_users }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Email</label>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="Nhập tên" class="form-control" name="email"
                                                required value="{{ $item->email }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Giới tính</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="sex_users">
                                                <option value="1" <?= $item->sex_users == 1 ? 'selected' : '' ?>
                                                    name="sex_users">
                                                    Nam
                                                </option>
                                                <option value="0" <?= $item->sex_users == 0 ? 'selected' : '' ?>
                                                    name="sex_users">
                                                    Nữ
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Ngày sinh</label>
                                        <div class="col-md-9">
                                            <input type="date" placeholder="Ngày sinh" class="form-control"
                                                name="created_at_time_users" required
                                                value="{{ $item->created_at_time_users }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Địa chỉ</label>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="địa chỉ" class="form-control"
                                                name="address_users" required value="{{ $item->address_users }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Số điện thoại</label>
                                        <div class="col-md-9">
                                            <input type="number" placeholder="số điện thoại" class="form-control"
                                                name="phone_users" required value="0{{ $item->phone_users }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3"></label>
                                        <div class="col-md-9">
                                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                            <a href="{{ route('users.index') }}" class="btn btn-fill btn-warning">Quay
                                                lại</a>
                                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                            <button type="submit" class="btn btn-fill btn-info">Sửaaa</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
