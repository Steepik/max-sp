@extends('layouts.app')
@section('content')
    <div class="personal-page">
        <div class="container">
            <div class="personal-block flex-box space-between">
                <div class="left">
                    <div class="personal-info flex-box">
                        <div class="personal-info-img">
                            <img src="img/user.png">
                        </div>
                        <div class="personal-info-contacts">
                            <p class="big">{{ Auth::user()->name }}</p>
                            <span>Телефон</span>
                            <p>{{ Auth::user()->phone }}</p>
                            <span>Email</span>
                            <p>{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="personal-title">Объект</div>

                    @forelse($projects as $project)
                    <div class="pers-object wow fadeIn" id="project_id_{{ $project->id }}">
                        <span>Адрес</span>
                        <p>{{ $project->address }}</p>

                        <span>Документы</span>
                        <div class="personal-docs flex-box">
                            @forelse($project->files as $document)
                            <div class="personal-docs-item pdf">
                                <div class="personal-docs-item-name">{{ $document->getFilename() }}</div>
                                <div class="personal-docs-item-size">{{ round($document->getSize() / 1024) }} КБ</div>
                            </div>
                            @empty
                                <h4>Нет документов</h4>
                            @endforelse
                        </div>

                        <span>Фото</span>
                        <div class="pers-slider">
                           @forelse($project->photos as $photo)
                               <img src="{{ asset($photo->path) }}">
                           @empty
                                <h4>Нет изображений</h4>
                           @endforelse
                        </div>
                        <div class="pers-slider-nav"></div>
                        <div class="flex-box justify-end">
                            <a href="{{ route('download', $project->id) }}" class="border-link">Скачать все</a>
                        </div>
                        <span>Оставить отзыв по проекту</span>
                        <form method="POST" class="form">
                            @csrf
                            <div>
                                <input class="personal-review" type="text" id="review_text" value="{{ old('review_text') }}" name="review_text" placeholder="" required="" />

                                <span class="invalid-feedback review-text-error" role="alert">
                                    <strong></strong>
                                </span>
                                <span class="valid-feedback review-text-status" role="alert">
                                    <strong></strong>
                                </span>
                                <span class="valid-feedback review-text-success" role="alert">
                                    <strong></strong>
                                </span>

                                <input type="hidden" id="project_id" value="{{  $project->id }}">
                                <input class="btn" id="sendReviewBtn" style="margin-top: 20px;" type="submit" value="Отправить" />
                            </div>
                        </form>
                    </div>
                    @empty
                        <h4>Нет объектов</h4>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection