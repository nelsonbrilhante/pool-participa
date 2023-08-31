@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Debug Session Data</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Key</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $value)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ is_array($value) ? json_encode($value) : $value }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
