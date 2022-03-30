@extends('layouts.master')
@section('title','Appointment')
@section('content')
    <!-- Page Wrapper -->
    <div style="width: 50%; height: 50%; background-color:antiquewhite; float:left;">
        <div class="my-5" style="width: 90%;padding-left:10%">
            <form action="{{ url('/appointment/add') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Appointment Date</label>
                    <input type="date" name="date" id="date" placeholder="mm/dd/yy" class="form-control" value="{{ old('date') }}" required> @error('date')<small class="text-danger">{{ $message }}</small>@enderror
                </div><br>
                <div class="form-group">
                    <label class="form-label">Select Department</label>
                    <select class="form-control dynamic" name="department_id" id="department_id" data-dependent="doctor" required>
                        <option value="">Select Department ID</option>
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->department_id }}">{{ $doctor->department_id }}</option>
                        @endforeach
                    </select>@error('department_id')<small class="text-danger">{{ $message }}</small>@enderror
                </div><br>
                <div class="form-group">
                    <label class="form-label">Select Doctor</label>
                    <select class="form-control dynamic" name="doctor" id="doctor" data-dependent="fee" required>
                    <option value="">Select</option>
                    @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->name }}">{{ $doctor->name }}</option>
                    @endforeach
                    </select>@error('doctor')<small class="text-danger">{{ $message }}</small>@enderror
                </div><span id="span1" style="color:green;font-weight:bold">Available</span>
                <span id="span2" style="color:red;font-weight:bold">Not Available</span><br><br>
                <div class="form-group">
                    <label class="form-label">Fee</label>
                    <select class="form-control" name="fee" id="fee" aria-readonly="true">
                        <option value="">Select</option>
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->fee }}">{{ $doctor->fee }}</option>
                        @endforeach
                        </select>@error('fee')<small class="text-danger">{{ $message }}</small>@enderror
                    {{-- <input type="text" name="fee" placeholder="Fee" class="form-control" readonly> @error('fee')<small class="text-danger">{{ $message }}</small>@enderror --}}
                </div><br>
                {{ csrf_field() }}
                <div class="submit-section" >
                    <button type="submit" class="btn btn-primary submit-btn"><i class="fa fa-user-plus"></i>&nbsp;Add </button>
                </div>
            </form>
        </div>
    </div>
    <div style="width: 50%; height: 50%; background-color:lightslategrey; float:left;">
        <div class="mt-5" style="width: 90%;padding-left:10%">
            <table id="show" class="table table-hover table-bordered table-striped" style="text-align: center">
                <thead>
                  <tr>
                    <th scope="col">SN</th>
                    <th scope="col">App. Date</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">Fee</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>test</td>
                    <td>
                        <a href="{{ url('doctor/delete/') }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you want to delete?')"> <i class="fa fa-trash"></i>&nbsp;Delete</a>
                    </td>
                  </tr>
                </tbody>
            </table>
        </div><br><br><br><br>
        <div class="mt-30" style="width: 90%;padding-left:10%">
            <div class="card my-10">
                <div class="card-body">
                    <form action="{{ url('/appointment/add') }}" method="post">
                        @csrf
                        <div class="row form-row">
                            <h6>Patient Information</h6>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" id="name" placeholder="Patient Name" class="form-control" value="{{ old('name') }}" required> @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="phone" id="phone" placeholder="Patient Phone" class="form-control" value="{{ old('phone') }}" required> @error('phone')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div><br>
                            <br><h6>Payment</h6>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="total_fee" id="total_fee" placeholder="Total Fee" class="form-control" value="{{ old('total_fee') }}" readonly> @error('total_fee')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="paid_amount" id="paid_amount" placeholder="Paid Amount" class="form-control" value="{{ old('paid_amount') }}" required> @error('paid_amount')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>
                            <div class="col-12">
                                    <br><button type="submit" class="btn btn-primary submit-btn"><i class="fa fa-user-plus"></i>&nbsp;Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Wrapper -->
@endsection
@section('scripts')
    <script>
        //Dependent Dropdown
        $(document).ready(function () {
            $('.dynamic').change(function () { 
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url: "{{ url('/getdoctor') }}",
                        type: "POST",
                        data: {select:select, value:value, _token:_token, dependent:dependent},
                        success: function (result) {
                            $('#'+dependent).html(result);
                        }
                    });
                }
            });
        });
    </script>
@endsection