@extends('dashboard')
@section('admin_content')

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> List Category</h4>

      <!-- Basic Bootstrap Table -->
      <div class="card">
        <h5 class="card-header">Table Cart</h5>
        <div class="table-responsive text-nowrap">
          <table id="table_id" class="table">
            <thead>
              <tr>
                <th>{{__('Mã đơn hàng')}}</th>
                <th>{{__('Tên người đặt')}}</th>
                <th>{{__('Email')}}</th>
                <th>{{__('Tổng tiền')}}</th>
                <th>{{__('Tình Trạng')}}</th>
                <th>{{__('Action')}}</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($datas as $data)
                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->order_total}}</td>
                    <td>{{$data->order_status}}</td>
                    <td>
                      <div >
                          <a class="btn btn-sm btn-primary" href="{{route('order.view',$data->id)}}">Chi tiết</a>
                          <a class="btn btn-sm btn-danger" href="{{route('order.complete',$data->id)}}">Xác nhận</a>
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