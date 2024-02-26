@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование пользователя</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="col-4">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label>Имя пользователя</label>
                            <input type="text" class="form-control" name="name" placeholder="Имя пользователя" value="{{ $user->name }}">

                            @error('name')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                            @enderror()
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Выберите role</label>
                            <select class="form-control" name="role">
                                @foreach ($roles as $id => $role)
                                    <option value="{{ $id }}"
                                        {{ $id == $user->role ? 'selected' : '' }}>{{ $role }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>email</label>
                            <input type="text" class="form-control" name="email" placeholder="email пользователя" value="{{ $user->email }}">

                            @error('email')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                            @enderror()
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Обновить">
                    </form>
                </div>
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
