@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Продукт</h1>
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex p-3">
                            <div>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Редактировать</a>
                            </div>
                            <form action="{{ route('product.delete', $product->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger ml-2" value="Удалить">
                            </form>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>{{ $product->id }}</td>
                                </tr>
                                    <tr>
                                        <td>Наименование продукта </td>
                                        <td>{{ $product->title }}</td>
                                    </tr>
                                <tr>
                                    <td>Описание продукта</td>
                                    <td>{{ $product->description }}</td>
                                </tr>
                                <tr>
                                    <td>Контент</td>
                                    <td>{{ $product->content }}</td>
                                </tr>
                                <tr>
                                    <td>Цена</td>
                                    <td>{{ $product->price }}</td>
                                </tr>
                                <tr>
                                    <td>Старая цена</td>
                                    <td>{{ $product->old_price }}</td>
                                </tr>
                                <tr>
                                    <td>Количество на складе</td>
                                    <td>{{ $product->count }}</td>
                                </tr>
                                <tr>
                                    <td>Категория</td>
                                    <td>{{ $product->category->title }}</td>
                                </tr>
                                <tr>
                                    <td>Изображения</td>
                                    <td>
                                    @foreach($product->images as $image)
                                    <div class="d-inline-block"><img src="/storage/{{ $image->file_path }}" style="width: 100px; height: 100px;"></div>
                                    @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>Теги</td>
                                    <td>
                                        @foreach($product->tags as $tag)
                                        <div class="mr-4 d-inline-block">
                                        {{ $tag->title }}
                                        </div>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>Цвета</td>
                                    <td>
                                        @foreach($product->colors as $color)
                                            <div class="mr-4 d-inline-block">
                                                <div class="d-inline-block" style="width: 16px; height: 16px; background: {{ '#'.$color->title  }}"></div>
                                                <div class="d-inline-block">#{{ $color->title }}</div>
                                            </div>
                                        @endforeach
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->


            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
