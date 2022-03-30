@extends('layouts.master')
@section('title','Home')
@section('content')
    <!-- Page Wrapper -->
    <div class="container py-5">
      @include('partials.flash')
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 style="text-align: center">Appointment List</h4>
            </div>
            <div class="card-body">
              <form action="{{ url('/') }}" method="GET" class="d-flex col-md-4">
                <input class="form-control me-2" type="search" name="search" placeholder="Search By Name" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
              <table class="table mt-2 table-info table-hover table-bordered table-striped" style="text-align: center">
                <thead>
                  <tr>
                    <th scope="col">SN</th>
                    <th scope="col">App. No</th>
                    <th scope="col">App. Date</th>
                    <th scope="col">Doctor ID</th>
                    <th scope="col">Patient Name</th>
                    <th scope="col">Patient Phone</th>
                    <th scope="col">Total Fee</th>
                    <th scope="col">Paid Amount</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($appointments as $item)
                  <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->appointment_no }}</td>
                    <td>{{ $item->appointment_date }}</td>
                    <td>{{ $item->doctor_id }}</td>
                    <td>{{ $item->patient_name }}</td>
                    <td>{{ $item->patient_phone }}</td>
                    <td>{{ $item->total_fee }}</td>
                    <td>{{ $item->paid_amount }}</td>
                    <td>
                      <a href="{{ url('appointment/delete'.$item->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you want to delete?')"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                    </td>
                  </tr> 
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          @include('partials.paginate', ['data' => $appointments])
        </div>
      </div>
    </div>
    <!-- Page Wrapper -->
@endsection