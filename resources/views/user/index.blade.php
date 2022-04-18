@extends('layouts.layout')
@section('main')
    <div class="main-content">
        <center>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </center>
        <h2>Danh sách người dùng</h2>
        <p><a herf="">Người dùng bị ẩn</a> </p>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="toolbar">
                        </div>
                        <div class="fresh-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                                width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">STT</th>
                                        <th style="text-align: center">Mã người dùng</th>
                                        <th style="text-align: center">Tên người dùng</th>
                                        <th style="text-align: center">Email</th>
                                        <th style="text-align: center">Hoạt động</th>
                                        <th style="text-align: center" colspan="2">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th style="text-align: center">STT</th>
                                        <th style="text-align: center">Mã người dùng</th>
                                        <th style="text-align: center">Tên người dùng</th>
                                        <th style="text-align: center">Email</th>
                                        <th style="text-align: center">Hoạt động</th>
                                        <th style="text-align: center" colspan="2">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @if (count($data) > 0)
                                        @foreach ($data as $item)
                                            <tr>
                                                <td style="text-align: center">{{ $i++ }}</td>
                                                <td style="text-align: center">{{ $item->id }}</td>
                                                <td style="text-align: center">{{ $item->name_users }}</td>
                                                <td style="text-align: center">{{ $item->email }}</td>
                                                <td style="text-align: center">
                                                    <input type="checkbox" data-toggle="switch" checked=""
                                                       data-on-text="ON" data-off-text="OFF"/>
                                                </td>
                                                <td style="text-align: right">
                                                    <a href="{{ route('users.show', [$item->id]) }}" rel="tooltip"
                                                        title="Thông tin" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-magic"></i>
                                                    </a>
                                                </td>
                                                {{-- <td style="text-align: center">
                                                    <a href="{{ route('users.update', [$item->id]) }}" rel="tooltip"
                                                        title="Sửa" class="btn btn-success btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td> --}}
                                                <td style="text-align: center">
                                                    <form action="{{ route('users.hidden', [$item->id]) }}" method="post">
                                                        @csrf
                                                        @method('GET')
                                                        <button style="border:hidden"
                                                            onclick="return confirm('Bạn có chắc muốn ẩn người dùng này ?')"
                                                            rel="tooltip" title="Ẩn"
                                                            class="btn btn-simple btn-danger btn-warning">
                                                            <i class=" fa fa-times"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10">
                                                <h3>Không có dữ liệu...</h3>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        {{-- {{ $data->appends(['search' => '$search'])->links('pagination::bootstrap-4') }} --}}
                    </div><!--  end card  -->
                </div> <!-- end col-md-12 -->
            </div> <!-- end row -->
        </div>
    </div>
@endsection
