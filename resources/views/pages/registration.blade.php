@extends('layouts.master')
@section('title','Registration')
@section('content')
    <!-- Page Wrapper -->
        <div class="container" >
            @include('partials.flash')
            <div class="card mt-5">
                <div class="card-body">
                    <form action="{{ url('doctor/add/submit') }}" method="POST">
                        @csrf
                        <h2 class="card-title" style="text-align: center;">Add Doctor</h2><hr>
                        <div class="row form-row">
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Dept. ID</label>
                                    <select class="form-control" name="department_id" required>
                                        <option value="">Select Dept. ID</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>@error('department_id')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-9">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}" required> @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input class="form-control" type="text" name="phone" placeholder="Contact No (01********)" pattern="[0]{1}[1]{1}[0-9]{9}" title="Enter 11 digits mobile number" value="{{ old('phone') }}" required>@error('phone')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Fee</label>
                                    <input type="text" name="fee" placeholder="Fee" class="form-control" value="{{ old('fee') }}" required> @error('fee')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="submit-section" >
                            <button type="submit" class="btn btn-primary submit-btn"><i class="fa fa-user-plus"></i> Add Doctor</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- Page Wrapper -->
@endsection