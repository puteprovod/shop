@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать продукт</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная</li>
                        <li class="breadcrumb-item active">Продукты</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row ml-2">
                <form action="{{ route ('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <input type="text" value="{{ $product->title ?? old('title') }}" name="title"
                               class="form-control" placeholder="Наименование">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{ $product->description ?? old('description') }}" name="description"
                               class="form-control" placeholder="Описание">
                    </div>
                    <div class="form-group">
                        <textarea name="content" cols="30" class="form-control" rows="10"
                                  placeholder="Контент">{{ $product->content ?? old('content') }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{ $product->old_price ?? old('old_price') }}" name="old_price"
                               class="form-control" placeholder="Старая цена">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{ $product->price ?? old('price') }}" name="price"
                               class="form-control" placeholder="Цена">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{ $product->count ?? old('count') }}" name="count"
                               class="form-control" placeholder="Количество на складе">
                    </div>
                    <div class="mt-3 mb-3">
                        @foreach($product->images as $image)
                            <div class="d-inline-block mr-3">
                                <div><img src="/storage/{{ $image->file_path }}" style="width: 100px; height: 100px;">
                                </div>
                                <div class="form-group text-center mt-2">
                                    <a href="{{ route('product.image.delete', ['product' => $product->id, 'image' => $image->id ]) }}" class="text-center">удалить</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="product_images[]" class="custom-file-input"
                                       id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Добавить изображение</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="product_images[]" class="custom-file-input"
                                       id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Добавить изображение</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="product_images[]" class="custom-file-input"
                                       id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Добавить изображение</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <select name="category_id" class="form-control select2" style="width: 100%;">
                            <option selected="selected">Выберите категорию</option>
                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->id }}" {{ $category->id == $product->category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Выберите теги"
                                style="width: 100%;">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}"
                                    {{ is_array($product->tags->pluck('id')->toArray()) && in_array($tag->id, $product->tags->pluck('id')->toArray()) ? 'selected' : '' }}
                                >{{ $tag->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="colors[]" class="colors" multiple="multiple" data-placeholder="Выберите цвета"
                                style="width: 100%;">
                            @foreach($colors as $color)
                                <option value="{{ $color->id }}"
                                    {{ is_array($product->colors->pluck('id')->toArray()) && in_array($color->id, $product->colors->pluck('id')->toArray()) ? 'selected' : '' }}
                                >{{ $color->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Изменить">
                    </div>


                </form>
            </div>
            <!-- /.row -->
            <!-- Main row -->


            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
