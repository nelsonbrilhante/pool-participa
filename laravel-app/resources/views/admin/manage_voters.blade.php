@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Manage Voters</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Voting Table</th>
                    <th scope="col">Has Voted</th>
                    <!-- Additional columns for actions like edit or delete can be added -->
                </tr>
            </thead>
            <tbody>
                @foreach ($voters as $voter)
                    <tr>
                        <td>{{ $voter->id_number }}</td>
                        <td>{{ $voter->name }}</td>
                        <td>{{ $voter->table }}</td>
                        <td>{{ $voter->has_voted ? 'Yes' : 'No' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
