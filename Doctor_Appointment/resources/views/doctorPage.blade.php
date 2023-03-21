@extends('layout.layout')


@section('content')
    <div class="doctorList">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Doctor List</h4>


                <form action="{{ route('doctorStatus') }}" method="post">
                    @csrf
                    <table class="table" id="myTableDoctor">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Department</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Fees</th>
                                <th scope="col">Avability</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alldoctorInfo as $key => $doctorInfo)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $doctorInfo->name }}</td>
                                    <td>{{ $doctorInfo->rel_to_department->name }}</td>
                                    <td>{{ $doctorInfo->phone }}</td>
                                    <td>{{ $doctorInfo->fee }}</td>
                                    <td>




                                        <button type="submit" class="btn btn-success"
                                            value="{{ $doctorInfo->id . ',' . 'Available' }}" type="submit"
                                            name="stutusButton" class="dropdown-item btn-primary">Available</button>
                                        <button type="submit" class="btn btn-danger"
                                            value="{{ $doctorInfo->id . ',' . 'Not Available' }}" type="submit"
                                            name="stutusButton" class="dropdown-item btn-primary">Not Available</button>


                                    </td>

                                    <td>{{ $doctorInfo->status == null ? 'Not Assigned' : $doctorInfo->status }}</td>

                                    <td>
                                         
                                        <a href="{{ route('doctorEdit', $doctorInfo->id) }}" class="btn btn-success">Edit</a>


                                        <a href="{{ route('doctorDelete', $doctorInfo->id) }}"
                                            class="btn btn-danger">Delete</a>

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('javaScriptSection')
    <script>
        $(document).ready(function() {
            $('#myTableDoctor').DataTable();
        });
    </script>
@endsection
