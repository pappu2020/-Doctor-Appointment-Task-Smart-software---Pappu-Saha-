@extends('layout.layout')

<style>
    .appList{
        padding: 30px;
        background-color: #ddd;
        height: 700px;
    }
</style>
@section('content')
    <div class="appList">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">My Appointment List</h4>

                <table class="table table-striped" id="myTableApp">
                    <thead>


                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Appointment No.</th>
                            <th scope="col">Appointment Date</th>
                            <th scope="col">Doctor Name</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Patient Phone</th>
                            <th scope="col">Fees</th>
                            <th scope="col">Total Amount</th>
                            <th scope="col">Paid Amount</th>
                            
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($allAppointment as $key => $Appointment)
                            
                        
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{ $Appointment->appointment_no}}</td>
                            <td>{{ $Appointment->appointment_date}}</td>
                            <td>{{ $Appointment->rel_to_doctor->name}}</td>
                            <td>{{ $Appointment->patient_name}}</td>
                            <td>{{ $Appointment->patient_phone}}</td>
                            <td>{{ $Appointment->Fees}}</td>
                            <td>{{ $Appointment->total_fee}}</td>
                            <td>{{ $Appointment->paid_amount}}</td>
                           
                        </tr>

                        @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('javaScriptSection')
    <script>
        $(document).ready(function() {
            $('#myTableApp').DataTable();
        });
    </script>
@endsection