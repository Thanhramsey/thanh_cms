@extends('layouts.admin')

@section('title', 'Quản lý Menu')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Danh sách Menu</h3>
            <form action="{{ route('admin.menus.index') }}" method="GET">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="title">Tìm theo tên:</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ request('title') }}">
                        </div>
                    </div>
                    {{-- Nếu bạn có thêm trường loại menu, bạn có thể thêm một dropdown tương tự ở đây --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="parent_id">Tìm theo menu cha:</label>
                            <select name="parent_id" id="parent_id" class="form-control">
                                <option value="">-- Tất cả --</option>
                                @foreach ($parentMenus as $parentMenu)
                                    <option value="{{ $parentMenu->id }}"
                                        {{ request('parent_id') == $parentMenu->id ? 'selected' : '' }}>
                                        {{ $parentMenu->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 align-self-end">
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                        <a href="{{ route('admin.menus.index') }}" class="btn btn-secondary">Reset</a>
                        <a href="{{ route('admin.menus.create') }}" class="btn btn-primary">Thêm mới</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tiêu đề</th>
                            <th>Đường dẫn</th>
                            <th>Thứ tự</th>
                            <th>Menu cha</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $menu)
                            <tr>
                                <td>{{ $menu->id }}</td>
                                <td>{{ $menu->title }}</td>
                                <td>{{ $menu->url }}</td>
                                <td>{{ $menu->order }}</td>
                                <td>{{ $menu->parent ? $menu->parent->title : '---' }}</td>
                                <td>
                                    <a href="{{ route('admin.menus.edit', $menu->id) }}"
                                        class="btn btn-sm btn-primary">Sửa</a>
                                    <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST"
                                        class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $menus->links() }}
            </div>
        </div>
    </div>

@endsection
