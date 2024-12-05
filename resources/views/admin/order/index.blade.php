@extends('admin.layout')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Sản phẩm</h5>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <div class="d-flex justify-content-between mb-4">
                        <button type="button" class="btn btn-success"><a href="{{ route('product.create') }}">Thêm sản
                                phẩm</a></button>
                        <div class="form-group d-flex justify-content-end">
                            <input type="text" class="">
                            <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Order date</th>
                                <th>Giá</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        @if ($item->status == 0)
                                            <span>Chưa xác nhận</span>
                                        @elseif ($item->status == 1)
                                            <span>đã xác nhận</span>
                                        @elseif ($item->status == 2)
                                            <span>đã thanh toán</span>
                                        @else
                                            <span>Đã hủy</span>
                                        @endif
                                    </td>
                                    <td>{{ number_format($item->totalPrice) }}</td>
                                    <td><a href="{{ route('order.detail', $item->id) }}"
                                            class="btn btn-sm btn-danger">aaaa</a></td>
                                </tr>
                                {{ $data->links('pagination::bootstrap-4') }}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
