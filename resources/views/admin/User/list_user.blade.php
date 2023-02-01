@extends('dashboard')
@section('admin_content')

    <!-- Content -->
<h1>duy ngu</h1>
    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> List Users</h4>

      <!-- Basic Bootstrap Table -->
      <div class="card">
        <h5 class="card-header">Table Basic</h5>
        <div class="table-responsive text-nowrap">
          <table id="table_id" class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($user as $u)
                <tr>
                    <td>{{$u->id}}</td>
                    <td>{{$u->name}}</td>
                    <td>{{$u->email}}</td>
                    <td>
                    @php
                        if($u->role==0){
                            echo "Admin";
                        }
                        else {
                            echo "User";
                        }
                    @endphp
                    </td>
                    <td>
                      <div>
                          <a class="btn btn-sm btn-primary" href="{{route('user.edit',$u->id)}}">
                            <i class="bx bx-edit-alt me-1"></i> Edit</a>
                          <a onclick="return confirm('Bạn có muốn xoá user này không?')" class="btn btn-sm btn-danger" href="{{route('user.delete',$u->id)}}">
                            <i class="bx bx-trash me-1"></i> Delete</a>
                        </div>
                    </td>
                  </tr>
                @endforeach
              

            </tbody>
          </table>
          {{-- {!! $user->withQueryString()->links('pagination::bootstrap-5') !!} --}}
        </div>
      </div>
      <!--/ Basic Bootstrap Table -->
    </div>
    <!-- / Content -->
@endsection