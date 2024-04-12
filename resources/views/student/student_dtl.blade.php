@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-dark text-white py-3">
                <h2 class="mb-0 text-center">Student Information</h2>
            </div>
            <div class="card-body">
                @if(session('success'))
                <script>
                    alert("{{ session('success') }}");
                </script>

            @elseif (session('added'))
            <script>
                alert("{{ session('added') }}");
            </script>

            @elseif (session('updated'))
            <script>
                alert("{{ session('updated') }}");
            </script>

            @elseif (session('delsuccess'))
            <script>
                alert("{{ session('delsuccess') }}");
            </script>

            @elseif (session('error'))
            <script>
                alert("{{ session('error') }}");
            </script>
            @elseif (session('errorr'))
            <script>
                alert("{{ session('errorr') }}");
            </script>

@elseif(session('successs'))
<script>
 alert("{{ session('successs') }}");
 </script>

            @endif

                <a href="{{ route('add.student') }}" class="btn btn-primary btn-lg mb-4 rounded-pill custom-btn">Add Student</a>
                <a href="{{ route('deleteall.student') }}" class="btn btn-danger btn-lg mb-4 rounded-pill custom-btn "onclick="confirmationn(event)">Delete All</a>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Sr No.</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Edit</th>
                                <th scope="col">View</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $counter = 1 @endphp
                            @foreach ($data as $user)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{ $user->student_name }}</td>
                                    <td>{{ $user->student_email }}</td>
                                    <td>
                                        <a href="/student_edit/{{ $user->id }}/edit" class="btn btn-outline-primary">Edit</a>
                                    </td>
                                    <td>
                                        <a href="/student_view/{{ $user->id }}/view" class="btn btn-outline-warning">View</a>
                                    </td>
                                    <td>
                                        <a href="/student_delete/{{ $user->id }}/delete" class="btn btn-outline-danger" onclick="confirmation(event)">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $data->links() }} <!-- Pagination links -->

            </div>
        </div>
    </div>
@endsection
