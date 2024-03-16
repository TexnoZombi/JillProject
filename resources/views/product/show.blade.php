@extends('layouts.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Пользователь</h1>
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
   <!-- Main content -->
   <section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex p-3">
                        <div class="mr-3">
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Редактировать</a>
                        </div>
                        <form action="{{route('product.delete', $product->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Удалить" class="btn btn-danger">
                        </form>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">

                            <tbody>
                                    <tr>
                                        <td>Id</td>
                                        <td>{{$product->id}} </td>
                                    </tr>
                                    <tr>
                                        <td>Название</td>
                                        <td>{{$product->name}} </td>
                                    </tr>
                                    <tr>
                                        <td>Категория</td>
                                        <td>
                                            @foreach ($categories as $category)
                                                @if ($category->id == $product->category_id)
                                                    {{$category->title}}
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Цена</td>
                                        <td>{{$product->price}} </td>
                                    </tr>
                                    <tr>
                                        <td>Цвет</td>
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
                                    </tr>
                                    <tr>
                                        <td>Теги</td>
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
                                    </tr>
                                    <tr>
                                        <td>Количество</td>
                                        <td>{{$product->count}}</td>
                                    </tr>

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>

    </div>
</section>
@endsection
