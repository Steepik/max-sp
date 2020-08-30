@extends('layouts.admin_app')

@section('content')
    <div class="container mt-5">
        <h3>Добавление проекта пользователю</h3>
        <form action="{{ route('save-project-to-user', $userId) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Введите адрес объекта</label>
                <input type="text" value="{{ old('name') }}" name="name" placeholder="Введите адрес" id="name" class="form-control">

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label for="documents">Загрузите документы к проекту</label><br>
                <input type="file" multiple name="documents[]" id="documents" accept="application/pdf"><br/>


                @error('documents')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                @if ($errors->has('documents.*'))
                <span class="invalid-feedback" role="alert">
                    @foreach($errors->get('documents.*') as $message)
                    <strong>{{ $message[0] }}</strong>
                    @break
                    @endforeach
                </span>
                @endif
            </div>

            <div class="form-group mb-5">
                <label for="photos">Загрузите фотографии к проекту</label><br>
                <input type="file" multiple name="photos[]" id="photos" accept="image/jpeg,image/png,image/jpg"><br>

                @error('photos')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                @if ($errors->has('photos.*'))
                    <span class="invalid-feedback" role="alert">
                    @foreach($errors->get('photos.*') as $message)
                            <strong>{{ $message[0] }}</strong>
                            @break
                        @endforeach
                </span>
                @endif
            </div>

            <button type="submit" class="btn btn-success">Добавить проект пользователю</button>
        </form>
    </div>
@endsection