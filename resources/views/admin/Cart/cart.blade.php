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
                <th>Id</th>
                <th>Name</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($cate as $cate)
                <tr>
                    <td>{{$cate->id}}</td>
                    <td>{{$cate->name}}</td>
                    <td>
                    @php
                        if($cate->status==0){
                            echo "Ẩn";
                        }elseif ($cate->status==1) {
                            echo "Hiển thị";
                        }else{
                            echo " ";
                        }
                    @endphp
                    </td>
                    <td>
                      <div >
                          <a class="btn btn-sm btn-primary" href="{{route('category.edit',$cate->id)}}">
                            <i class="bx bx-edit-alt me-1"></i> Edit</a>
                          {{-- <a onclick="return confirm('Bạn có muốn xoá category này không?')" class="btn btn-sm btn-danger" href="{{route('category.delete',$cate->id)}}">
                            <i class="bx bx-trash me-1"></i> Delete</a
                          > --}}
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