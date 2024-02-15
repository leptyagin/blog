@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование поста</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{ route('admin.post.update', $post->id) }}" method="POST" class="col-4">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label>Название поста</label>
                            <input type="text" class="form-control" name="title" placeholder="Название категории" value="{{ $post->title }}">

                            @error('title')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                            @enderror()
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
