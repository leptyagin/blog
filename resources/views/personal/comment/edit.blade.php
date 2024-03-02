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
                <div class="col-sm-12">
                    <form action="{{ route('personal.comment.update', $comment->id) }}" method="POST" class="w-50">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label>Название коммента</label>

                            <textarea class="form-control" name="message">
                                {{ $comment->message }}
                            </textarea>

                            @error('message')
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
