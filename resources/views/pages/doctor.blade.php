@extends('layouts.master')
@section('title','Doctor')
@section('content')

<!-- Add Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Doctor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ url('doctor/add/submit') }}" method="post">
        @csrf
        <div class="modal-body">
          <div class="form-group mb-3">
            <label class="form-label">Dept. ID</label>
            <select class="form-control" name="department_id" required>
              <option value="">Select Dept. ID</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>@error('department_id')<small class="text-danger">{{ $message }}</small>@enderror
          </div>
          <div class="form-group mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}" required> @error('name')<small class="text-danger">{{ $message }}</small>@enderror
          </div>
          <div class="form-group mb-3">
            <label class="form-label">Phone</label>
            <input class="form-control" type="text" name="phone" placeholder="Contact No (01********)" pattern="[0]{1}[1]{1}[0-9]{9}" title="Enter 11 digits mobile number" value="{{ old('phone') }}" required>@error('phone')<small class="text-danger">{{ $message }}</small>@enderror
          </div>
          <div class="form-group mb-3">
            <label class="form-label">Fee</label>
            <input type="text" name="fee" placeholder="Fee" class="form-control" value="{{ old('fee') }}" required> @error('fee')<small class="text-danger">{{ $message }}</small>@enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Add Modal -->

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit & Update Doctors Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ url('doctor/update') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group mb-3">
            <input type="hidden" name="id" id="data_id" value="">
            <label class="form-label">Dept. ID</label>
            <select class="form-control" name="department_id" id="data_department_id" required>
              <option value="">Select Dept. ID</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>@error('department_id')<small class="text-danger">{{ $message }}</small>@enderror
          </div>
          <div class="form-group mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" id="data_name" placeholder="Name" class="form-control" value="" required> @error('name')<small class="text-danger">{{ $message }}</small>@enderror
          </div>
          <div class="form-group mb-3">
            <label class="form-label">Phone</label>
            <input class="form-control" type="text" name="phone" id="data_phone" placeholder="Contact No (01********)" pattern="[0]{1}[1]{1}[0-9]{9}" title="Enter 11 digits mobile number" value="" required>@error('phone')<small class="text-danger">{{ $message }}</small>@enderror
          </div>
          <div class="form-group mb-3">
            <label class="form-label">Fee</label>
            <input type="text" name="fee" id="data_fee" placeholder="Fee" class="form-control" value="" required> @error('fee')<small class="text-danger">{{ $message }}</small>@enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Edit Modal -->

<!-- Page Wrapper -->
    <div class="container py-5">
      @include('partials.flash')
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>
                Doctor List
                <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i>&nbsp;Add Doctor</button>
              </h4>
            </div>
            <div class="card-body">
              <form action="{{ url('/doctor') }}" method="GET" class="d-flex col-md-4">
                  <input class="form-control me-2" type="search" name="search" placeholder="Search By Name" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
              <table class="table mt-2 table-info table-hover table-bordered table-striped" style="text-align: center">
                <thead>
                  <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Dept. ID</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Fee</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($doctors as $doctor)
                  <tr>
                    <th scope="row">{{ $doctor->id }}</th>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->department_id }}</td>
                    <td>{{ $doctor->phone }}</td>
                    <td>{{ $doctor->fee }}</td>
                    <td>
                      {{-- <button type="button" value="{{ $doctor->id }}" class="btn btn-primary editbtn btn-sm"><i class="fa fa-edit"></i>&nbsp;Edit</button> --}}
                      <a type="button" class="btn btn-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{$doctor->id}}" data-name="{{$doctor->name}}"
                      data-department_id="{{$doctor->department_id}}" data-phone="{{$doctor->phone}}" data-fee="{{$doctor->fee}}"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                        {{-- <a type="button" data-bs-toggle="modal" value="{{ $doctor->id }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;Edit</a>  --}}
                      <a href="{{ url('doctor/delete/'.$doctor->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you want to delete?')"> <i class="fa fa-trash"></i>&nbsp;Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
            </div>
          </div>
          @include('partials.paginate', ['data' => $doctors])
        </div>
      </div>
    </div>
<!-- Page Wrapper -->

@endsection
@section('scripts')
    <script>
        $("#editModal").on('shown.bs.modal', function (event) {
         var button = $(event.relatedTarget);
         var data_id = button.data('id');
         var data_name = button.data('name');
         var data_department_id = button.data('department_id');
         var data_phone = button.data('phone');
         var data_fee = button.data('fee');
         var modal = $(this);
         modal.find('.modal-body #data_id').val(data_id);
         modal.find('.modal-body #data_name').val(data_name);
         modal.find('.modal-body #data_department_id').val(data_department_id);
         modal.find('.modal-body #data_phone').val(data_phone);
         modal.find('.modal-body #data_fee').val(data_fee);
        });
    </script>
@endsection