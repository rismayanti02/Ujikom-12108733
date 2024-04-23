@extends('layout.dashboard')
@section('title', 'User')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>User List</h1>
        </div>
    </section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Users Table</h4>
                    <div class="card-header-form">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> New
                                    Account</a>
                            </div>
                        </div>
                    </div>
                </div>

                <form class="form" method="get" action="{{ route('search') }}">
                    <div class="form-group w-100 mb-3">
                        <label for="search" class="d-block mr-2">Pencarian</label>
                        <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan keyword">
                        <button type="submit" class="btn btn-primary mb-1">Cari</button>
                    </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Last Login</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($users as $acc)
                                <tr>
                                    <td>{{ $acc->name }}</td>
                                    <td>{{ $acc->email }}</td>
                                        <td>
                                            <div class="badge badge-success">Admin</div>
                                        </td>
                                        <td>
                                            <div class="badge badge-warning">Petugas</div>
                                        </td>
                                    @if ($acc->last_login == null)
                                        <td>Belum Login</td>
                                    @else
                                        <td>{{ $acc->last_login }}</td>
                                    @endif
                                    <td>
                                        <form method="post" action="">
                                            {{-- <a href="{{ route('user.edit', $acc->id) }}" class="btn btn-primary">Edit</a>
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger">Delete</button> --}}
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
