@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Продукты</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная</li>
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
                        <div class="card-header">
                            <a href="{{ route('product.create') }}" class="btn btn-primary">Добавить</a>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Название</th>
                                        <th>Категория</th>
                                        <th>Цена</th>
                                        <th>Цвет</th>
                                        <th>Теги</th>
                                        <th>Количество</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>
                                                <a href="{{ route('product.show', $product->id) }}">{{$product->name}}</a>
                                            </td>
                                            <td>
                                                @foreach ($categories as $category)
                                                    @if ($category->id == $product->category_id)
                                                        {{$category->title}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{$product->price}}</td>
                                            <td>
                                                @foreach ($productColors as $productColor)
                                                    @if ($productColor->product_id == $product->id)
                                                        @foreach ($colors as $color)
                                                            @if ($color->id == $productColor->color_id)
                                                                {{$color->title}}
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($productTags as $productTag)
                                                    @if ($productTag->product_id == $product->id)
                                                        @foreach ($tags as $tag)
                                                            @if ($tag->id == $productTag->tag_id)
                                                                {{$tag->title}}
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{$product->count}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection
