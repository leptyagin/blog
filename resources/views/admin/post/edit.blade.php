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
                    <form action="{{ route('admin.post.update', $post->id) }}" method="POST" class="col-sm-12" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group col-4">
                            <label>Название поста</label>
                            <input type="text" class="form-control" name="title" placeholder="Название категории"
                                value="{{ $post->title }}">

                            @error('title')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                            @enderror()
                        </div>
                        <div class="form-group">
                            <textarea id="summernote" name="content">
                                {{ $post->content }}
                            </textarea>
                            @error('content')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                            @enderror()
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Добавить превью</label>
                            <div class="col-sm-6">
                                <img src="{{ url('storage/' . $post->preview_img)}}" alt="{{ $post->title }}" class="img-fluid">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="preview_img">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        @error('preview_img')
                            <div class="text-danger">Это поле необходимо заполнить</div>
                        @enderror()

                        <div class="form-group">
                            <label for="exampleInputFile">Добавить главное изображение</label>
                            <div class="col-sm-6">
                                <img src="{{ url('storage/' . $post->main_img)}}" alt="{{ $post->title }}"  class="img-fluid">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="main_img">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        @error('main_img')
                            <div class="text-danger">Это поле необходимо заполнить</div>
                        @enderror()

                        <div class="form-group col-sm-6">
                            <label>Выберите категорию</label>
                            <select class="form-control" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-9">
                            <label>выберите тэги</label>
                            <select class="select2" multiple="multiple" style="width: 100%;" class="form-control"
                                name="tag_ids[]">

                                @foreach ($tags as $tag)
                                    <option
                                        {{ is_array( $post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : '' }}
                                        value="{{ $tag->id }}">{{ $tag->title }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Обновить">
                        </div>
                    </form>
                </div>
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
