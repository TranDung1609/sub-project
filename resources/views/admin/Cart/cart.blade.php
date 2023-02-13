@extends('dashboard')
@section('admin_content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> {{ __('List Order') }}</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">{{ __('Table Cart') }}</h5>
            <div class="table-responsive text-nowrap">
                <table id="table_id" class="table">
                    <thead>
                        <tr>
                            <th>{{ __('Mã đơn hàng') }}</th>
                            <th>{{ __('Tên người đặt') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Tổng tiền') }}</th>
                            <th>{{ __('Tình Trạng') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->order_total }}</td>
                                <td>{{ $item->order_status }}</td>
                                <td>
                                    <div>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('order.view', $item->id) }}">{{ __('Chi tiết') }}</a>
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ route('order.complete', $item->id) }}">{{ __('Xác nhận') }}</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
    <!-- / Content -->
@endsection
