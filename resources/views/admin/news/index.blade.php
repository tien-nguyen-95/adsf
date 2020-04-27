@extends('layouts.admin')

@section('title', 'Bài viết')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        <a href="{{  route('news.create')  }}" class="btn btn-primary">Thêm mới</a>
    </p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách Loại sản phẩm</h6>
        </div>

        <div class="col-sm-12">
            @if (session('success'))

            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                    style="font-size: 13.5px;">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Nội dung</th>
                            <th>Ảnh</th>
                            <th>Thời gian tạo</th>
                            <th>Thời gian sửa</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($list_news) < 1)
                            Không có dữ liệu
                        @else
                        @foreach ($list_news as $key => $news)

                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $news->title }}</td>
                            <td><a href="{{ route('news.show', $news->id) }} "><i class="fas fa-database"></i> Chi tiết</a></td>
                            <td><img src="images/news/{{ $news->image }}"" alt="" height="60px" width="60px"></td>
                            <td>{{ $news->user_created }}<br>
                                {{ $news->created_at }}</td>
                            <td>{{ $news->user_updated }}<br>
                                {{ $news->updated_at }}</td>
                            <td><a href="{{ route('news.edit', $news->id) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-edit" title="Sửa"></i></a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('news.destroy', $news->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Bạn chắc chắn muốn xóa ?')"
                                        class="btn btn-danger btn-sm"><i class="fa fa-trash-alt" title="Thùng rác"></i></button>
                                </form>
                            </td>
                        </tr>

                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection
