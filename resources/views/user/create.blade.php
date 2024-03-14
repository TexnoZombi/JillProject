@extends('layouts.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Добавить пользователя</h1>
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
        <form action="{{ route('user.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <input type="text" value="{{old('name')}}" class="form-control" name="name" placeholder="Имя">
            </div>
            <div class="form-group">
                <input type="email" value="{{old('email')}}" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" value="{{old('password')}}" class="form-control" name="password" placeholder="Пароль">
            </div>
            <div class="form-group">
                <input type="password" value="{{old('password_confirmation')}}" class="form-control" name="password_confirmation" placeholder="Подтвердите пароль">
            </div>
            <div class="form-group">
                <input type="text" value="{{old('surname')}}" class="form-control" name="surname" placeholder="Фамилия">
            </div>
            <div class="form-group">
                <input type="text" value="{{old('patronymic')}}" class="form-control" name="patronymic" placeholder="Отчество">
            </div>
            <div class="form-group">
                <input type="text" value="{{old('age')}}" class="form-control" name="age" placeholder="Возраст">
            </div>
            <div class="form-group">
                <input type="text" value="{{old('address')}}" class="form-control" name="address" placeholder="Адрес">
            </div>

            <div class="form-group">
                <select name="gender" class="custom-select form-control" id="exampleSelectBorder">
                    <option disabled selected>Пол</option>
                    <option {{old('gender') == 1 ? 'selected' : ''}} value="1">Мужской</option>
                    <option {{old('gender') == 2 ? 'selected' : ''}} value="2">Женский</option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Добавить">
            </div>
        </form>
      </div>

    </div>
  </section>
@endsection
