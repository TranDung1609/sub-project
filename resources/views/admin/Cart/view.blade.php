@extends('dashboard')
@section('admin_content')

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> List Category</h4>

      <!-- Basic Bootstrap Table -->
      <div class="card">
        <h5 class="card-header">Cart Detail</h5>
        <div class="table-responsive text-nowrap">
          <table id="table_id" class="table">
            <thead>
              <tr>
                <th>{{__('STT')}}</th>
                <th>{{__('Tên sản phẩm')}}</th>
                <th>{{__('Giá sản phẩm')}}</th>
                <th>{{__('Số lượng')}}</th>
                <th>{{__('Tổng tiền')}}</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php
                $i=0;
                @endphp
                @foreach ($order_details as $order_detail)
                @php
                    $i++;
                @endphp
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$order_detail->product_name}}</td>
                    <td>{{$order_detail->product_price}}</td>
                    <td>{{$order_detail->quantity}}</td>
                    <td>{{($order_detail->product_price)*($order_detail->quantity) }}</td>
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