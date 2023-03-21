@extends('layout.layout')

<style>
    .MainDiv {
        padding-left: 120px;
        padding-right: 120px;
    }

    .myLeftForm {
        background-color: #EEEEEF;
        padding: 30px;
    }

    .RightPartMain {
        background-color: #6C757D;
    }

    .appoinmentInfoTable {
        padding: 40px;
    }

    .paymentInfo {
        background-color: white;
        color: black;
        padding: 30px;
    }

    .btnSub {
        width: 400px;
        margin-left: 15px;
    }
</style>

@section('content')
    <div class="row MainDiv">
        <div class="col-lg-5 leftPartMain">

            <div class="myLeftForm">
                <form action="{{ route('appoimentVerfication') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="appointDate" class="form-label">Appointment Date</label>
                        <input type="date" class="form-control w-75" id="exampleInputEmail1" name="appointDate">

                    </div>
                    <label for="department" class="form-label">Select department</label>
                    <select class="form-select w-75 mb-3 departmentSelect" name="department">
                        <option selected>--Select--</option>

                        @foreach ($alldepartmentInfo as $departmentInfo)
                            <option value="{{ $departmentInfo->id }}">{{ $departmentInfo->name }}</option>
                        @endforeach

                    </select>
                    <label for="doctor" class="form-label">Select doctor</label>
                    <select class="form-select w-75 mb-1" id="doctorSelect" name="doctor">
                        <option selected>--Select--</option>


                    </select>

                    <p class="statusShow text-primary mb-3"></p>

                    <label for="doctorPays" class="form-label">Fee</label>
                    <input type="number" readonly class="form-control w-75 mb-3" id="doctorFess" name="doctorFess">



                    <button type="submit" class="btn btn-success addBtn" name="initialAdd">Add</button>

            </div>

            </form>

        </div>

        <div class="col-lg-5 RightPartMain">

            <div class="appoinmentInfoTable">
                <table class="table table-bordered text-light">
                    <thead>
                        <tr>
                            <th scope="col">SN</th>
                            <th scope="col">App.Date</th>
                            <th scope="col">Doctor</th>
                            <th scope="col">Fee</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($allUserInitialAppInfo as $key => $UserInitialAppInfo)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $UserInitialAppInfo->App_date }}</td>
                                <td>{{ $UserInitialAppInfo->rel_to_doctor->name }}</td>
                                <td>{{ $UserInitialAppInfo->Fees }}</td>
                                <td><a href="{{ route('userInitialAppDelete', $UserInitialAppInfo->id) }}"
                                        class="btn btn-danger">Delete</a></td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>


            <div class="paymentInfo">

                <form action="{{route("finalSubmission")}}" method="post">
                    @csrf
                    <div class="row">
                        <h6 class="fw-bold">Patient Information</h6>
                        <div class="col">
                            <label for="patientName" class="form-label"></label>
                            <input type="text" class="form-control" placeholder="Patient Name" name="patientName">
                        </div>

                        @error("patientName")

                        <p class="mt-2 mb-2 text-danger">{{$message}}</p>
                            
                        @enderror
                        <div class="col">
                            <label for="patientNum" class="form-label"></label>
                            <input type="text" class="form-control" placeholder="Patient Phone" name="patientNum">
                        </div>
                        @error("patientNum")

                        <p class="mt-2 mb-2 text-danger">{{$message}}</p>
                            
                        @enderror
                    </div>

                    <div class="row mt-3">
                        <h6 class="fw-bold">Payments</h6>
                        <div class="col">
                            <label for="totalFee" class="form-label">Total Fee</label>
                            <input type="text" class="form-control" value="{{ $totalFees }}" name="totalFee">
                            @error("totalFee")

                        <p class="mt-2 mb-2 text-danger">{{$message}}</p>
                            
                        @enderror
                        </div>
                        <div class="col">
                            <label for="paidAmount" class="form-label">Paid Amount</label>

                            <input type="text" class="form-control" name="paidAmount">
                             @error("paidAmount")

                        <p class="mt-2 mb-2 text-danger">{{$message}}</p>
                            
                        @enderror
                        </div>
                    </div>

                    <input type="hidden" value="
                    @if (isset($UserInitialAppInfo->App_date))

                    {{ $UserInitialAppInfo->App_date }}
                        
                    @endif" name="hiddenAppDate">
                   
                    <input type="hidden" value="
                    @if (isset($UserInitialAppInfo->rel_to_doctor->id))

                    {{ $UserInitialAppInfo->rel_to_doctor->id}}
                        
                    @endif" name="hiddenDoctorId">
                   

                    <button type="submit" class="btn btn-primary btnSub mt-2" name="finalSubmit">Submit</button>
            </div>

        </div>

        </form>
    </div>
@endsection

@section('javaScriptSection')
    <script>
        $('.departmentSelect').change(function() {

            var department_id = $(this).val();


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                type: 'POST',
                url: '/appointmentPageDepartInfo',
                data: {
                    'department_id': department_id
                },
                success: (function(data) {
                    $('#doctorSelect').html(data);
                })
            })


        });


        $('#doctorSelect').change(function() {

            var doctor_info = $(this).val();


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                type: 'POST',
                url: '/doctor_satusInfo',
                data: {
                    'doctor_info': doctor_info
                },
                success: (function(data) {
                    $('.statusShow').html(data);
                    if (data == "Available") {

                        $(".addBtn").css("display", "block");

                    } else {
                        $(".addBtn").css("display", "none");
                    }
                })
            })


        });

        $('#doctorSelect').change(function() {

            var doctor_info = $(this).val();


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                type: 'POST',
                url: '/doctor_PaysInfo',
                data: {
                    'doctor_info': doctor_info
                },
                success: (function(data) {
                    $('#doctorFess').val(data);
                })
            })


        });
    </script>
@endsection
