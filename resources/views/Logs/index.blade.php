@extends('layouts.app')


@section('breadcrumb')
    <div class="d-flex align-items-center ml-4 mx-5">
        <h4>Logs</h4>
    </div>
@endsection

@section('content')

    <div class="container">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Date / Time</th>
                    <th scope="col">User</th>
                    <th scope="col">Description</th>
                    <th scope="col">Student</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($ActivityLogs as $ActivityLog)
                    <tr>

                        <td>{{ $ActivityLog->log_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($ActivityLog->created_at)->format('F d, Y') }},
                            {{ \Carbon\Carbon::parse($ActivityLog->created_at)->format('g:i A') }}</td>
                        <td>{{ $ActivityLog->causer->name }}</td>
                        <td>{{ $ActivityLog->description }}</td>


                        @if ($ActivityLog->subject_id == null)

                            <td> </td>

                        @else

                            <td>{{ $ActivityLog->subject->last_name }}, {{ $ActivityLog->subject->first_name }}
                                {{ $ActivityLog->subject->middle_name }} {{ $ActivityLog->subject->suffix }}</td>

                        @endif

                    </tr>

                @endforeach
            </tbody>
        </table>

    </div>

@endsection
