@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Writing Quiz Questions') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if (Auth::user()->auth_level === 0)
                    <form method="POST" action="{{ route('quizzes.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="question" class="col-md-4 col-form-label text-md-right">{{ __('Question') }}</label>

                            <input id="question" type="text" class="form-control col-md-6 @error('question') is-invalid @enderror" name="question" value="{{ old('question') }}" required autofocus>

                            @error('question')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="answer1" class="col-md-4 col-form-label text-md-right">{{ __('Answers') }}</label>
                            @error('answers')
                                <span class="invalid-feedback col-md-12" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="row">
                            <label for='answer1' class='col-md-4 col-form-label text-md-right'>{{ __('1.') }}</label>
                            <input type="text" id="answer1" class="form-control col-md-6 @error('answers') is-invalid @enderror" name="answers[]" required>
                        </div>
                        <div class="row">
                            <label for='answer2' class='col-md-4 col-form-label text-md-right'>{{ __('2.') }}</label>
                            <input type="text" id="answer1" class="form-control col-md-6 @error('answers') is-invalid @enderror" name="answers[]" required>
                        </div>
                        <div class="row">
                            <label for='answer3' class='col-md-4 col-form-label text-md-right'>{{ __('3.') }}</label>
                            <input type="text" id="answer1" class="form-control col-md-6 @error('answers') is-invalid @enderror" name="answers[]" required>
                        </div>
                        <div class="row">
                            <label for='answer4' class='col-md-4 col-form-label text-md-right'>{{ __('4.') }}</label>
                            <input type="text" id="answer1" class="form-control col-md-6 @error('answers') is-invalid @enderror" name="answers[]" required>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="right_answer_idx" class="col-md-4 col-form-label text-md-right">{{ __('Right Answer') }}</label>
                            <select id="right_answer_idx" class="form-control col-md-6 @error('right_answer_idx') is-invalid @enderror" name="right_answer_idx">
                                <option value="0">1</option>
                                <option value="1">2</option>
                                <option value="2">3</option>
                                <option value="3">4</option>
                            </select>
                            @error('right_answer_idx')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    @else
                    @foreach ($quizzes as $quiz)
                    <div class="card mb-4">
                        <div class="card-header">{{ $quiz->question }}</div>
                        <div class="card-body">
                        @for ($i = 0; $i < count($quiz->answers); $i++)
                            <div class='col-md-12' @if ($i === $quiz->right_answer_idx) style='background-color: #fafafa; font-weight:bold;' @endif>
                                <input type='radio' name='answer{{$quiz->id}}' class='form-check-input' />
                                {{ $i + 1 }}. {{ $quiz->answers[$i] }}
                            </div>
                        @endfor
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
