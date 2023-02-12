@php
    $user_id = Auth::user()->id;
    $order = App\Models\Order::with('order_details', 'shipping')
        ->where('user_id', $user_id)
        ->orderBy('created_at', 'desc')
        ->first();
@endphp
<table id="table_id" class="table">
    <thead>
        <tr>
            <th>{{ __('Mã đơn hàng') }}</th>
            <th>{{ __('Tên người đặt') }}</th>
            <th>{{ __('Email') }}</th>
            <th>{{ __('Tổng tiền') }}</th>
            <th>{{ __('Tình Trạng') }}</th>
            {{-- <th>{{ __('Action') }}</th> --}}
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->email }}</td>
            <td>{{ $order->order_total }}</td>
            <td>{{ $data->order_status }}</td>
            {{-- <td>
                    <div>
                        <a class="btn btn-sm btn-primary"
                            href="{{ route('order.view', $data->id) }}">{{ __('Chi tiết') }}</a>
                        <a class="btn btn-sm btn-danger"
                            href="{{ route('order.complete', $data->id) }}">{{ __('Xác nhận') }}</a>
                    </div>
                </td> --}}
        </tr>
    </tbody>
</table>
