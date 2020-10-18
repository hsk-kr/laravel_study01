@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register a Lecture') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('lecture.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-center">{{ __('Lecture Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-center">{{ __('Lecture Description') }}</label>
                            <div class="col-md-6">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" style="resize:none;" required></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lecture_goal_desc" class="col-md-4 col-form-label text-md-center">{{ __('Lecture Goal Description') }}</label>
                            <div class="col-md-6">
                                <textarea id="lecture_goal_desc" class="form-control @error('lecture_goal_desc') is-invalid @enderror" name="lecture_goal_desc" value="{{ old('lecture_goal_desc') }}" style="resize:none;" rows=5 required></textarea>

                                @error('lecture_goal_desc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lecture_start_date" class="col-md-4 col-form-label text-md-center">{{ __('Lecture Start Date') }}</label>
                            <div class="col-md-6">
                                <input id="lecture_start_date" type="date" class="form-control @error('lecture_start_date') is-invalid @enderror" name="lecture_start_date" value="{{ old('lecture_start_date') }}" required>

                                @error('lecture_start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lecture_end_date" class="col-md-4 col-form-label text-md-center">{{ __('Lecture End Date') }}</label>
                            <div class="col-md-6">
                                <input id="lecture_end_date" type="date" class="form-control @error('lecture_end_date') is-invalid @enderror" name="lecture_end_date" value="{{ old('lecture_start_date') }}" required>

                                @error('lecture_end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr />
                        <div class="form-group row">
                            <label for="use_nickname" class="col-md-4 col-form-label text-md-right">{{ __('Use Nickname') }}</label>
                            <div class="col-md-6" style="display: flex; align-items: center; justify-content: center;">
                                <input id="use_nickname" type="checkbox" style="width:1em; height:1em;" class="form-control @error('use_nickname') is-invalid @enderror" name="use_nickname" value="1">

                                @error('use_nickname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row use-classes">
                            <label for="use_classes" class="col-md-4 col-form-label text-md-right">{{ __('Use Classes') }}</label>
                            <div class="col-md-6" style="display: flex; align-items: center; justify-content: center;">
                                <input id="use_classes" type="checkbox" style="width:1em; height:1em;" class="form-control @error('use_classes') is-invalid @enderror" name="use_classes" value="1">

                                @error('use_classes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class='lecture-class' style='display: none;'></div>
                        <hr />
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Register Lecture') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
