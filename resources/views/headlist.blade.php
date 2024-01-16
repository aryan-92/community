@extends('layout.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Head Member List</h3>

        <a href="{{ route('showFamForm') }}" class="btn btn-primary">Add Member</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Sl.No</th>
                        <th>Name</th>
                        <th>Member Associated</th>
                        <th>view</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($headMember as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->family_members_count }}</td>
                        <td><a href="{{ route('ViewMember',[$item->id]) }}">View</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('js')
@endsection
