@extends('layout.layout')


@section('content')
    <div class="doctorEdit">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit your Info</h4>
                <div class="editForm">
                    <form class="w-75" action="{{route("doctorUpdate")}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name"
                                value="{{ $allDoctorInfo->first()->name }}">

                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone"  value="{{ $allDoctorInfo->first()->phone }}">

                        </div>

                        <div class="mb-3">
                            <label for="fess" class="form-label">Fees</label>
                            <input type="text" class="form-control" name="fees" value="{{ $allDoctorInfo->first()->fee }}">

                        </div>

                        <input type="hidden" name="doctor_id" value="{{ $allDoctorInfo->first()->id }}">

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
