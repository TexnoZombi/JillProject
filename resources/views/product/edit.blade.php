@extends('layouts.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Редактировать продукт</h1>
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
        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="form-group">
                <input type="text" value="{{$product->name ?? old('name')}}"  class="form-control" name="name" placeholder="Название">
            </div>
            <div class="form-group">
                <input type="text" value="{{$product->description ?? old('description')}}" class="form-control" name="description" placeholder="Описание">
            </div>
            <div class="form-group">
                <textarea  name="content" class="form-control" placeholder="Содержание" rows="10" cols="30">{{$product->content ?? old('content')}}</textarea>
            </div>
            <div class="form-group">
                <input type="text"  value="{{$product->price ?? old('price')}}"  class="form-control" name="price" placeholder="Цена">
            </div>
            <div class="form-group">
                <input type="text" value="{{$product->count ?? old('count')}}" class="form-control" name="count" placeholder="Количество">
            </div>
            <div class="form-group">
                <div class="input-group">
                  <div class="custom-file">
                    <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Выберите изображение</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Загрузить</span>
                  </div>
                </div>
              </div>
            <div class="form-group">
                <select name="category_id" class="custom-select form-control" >
                    <option disabled selected>Выберите категорию</option>
                    @foreach ($categories as $category)
                        @if ($category->id == $product->category_id)
                            <option  value="{{$category->id}} " selected disabled>{{$category->title }}</option>

                        @else
                            <option  value="{{$category->id}}">{{$category->title }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="tags[]" class="select2 tags" multiple="multiple" data-placeholder="Выберите тег" style="width: 100%;">
                    @foreach ($tags as $tag)
                        <option value="{{$tag->id}}"
                            @foreach ($productTags as $productTag)
                                @if ($productTag->product_id == $product->id && $tag->id == $productTag->tag_id)
                                    selected
                                @endif
                            @endforeach
                        >{{$tag->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="colors[]" class="select2 colors" multiple="multiple" data-placeholder="Выберите цвет" style="width: 100%;">
                    @foreach ($colors as $color)
                        <option value="{{$color->id}}"
                            @foreach ($productColors as $productColor)
                                @if ($productColor->product_id == $product->id && $color->id == $productColor->color_id)
                                    selected
                                @endif
                            @endforeach
                        >{{$color->title}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Изменить">
            </div>
        </form>
      </div>

    </div>
  </section>
@endsection
