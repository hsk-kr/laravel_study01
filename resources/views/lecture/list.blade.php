@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lectures') }}</div>

                <div class="card-body">
                    <a href="{{ route('lecture.create') }}">Register a Lecture</a>
                    <hr />
                    Lectures (Newest)
                    <hr />
                    @foreach ($lectures as $lecture)
                    <div class="card mb-4">
                        <div class="card-header">{{ $lecture->name }}</div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <label class="col-md-12">{{ __('Description') }}</label>
                                <p class="col-md-10 text">{{ $lecture->description }}</p>
                            </div>
                            <div class="row justify-content-center mt-2">
                                <label class="col-md-12">{{ __('Lecture Goal Description') }}</label>
                                <p class="col-md-10 text">{{ $lecture->lecture_goal_desc }}</p>
                            </div>
                            <div class="row mt-2">
                                <label class="col-md-4">{{ __('Lecture Start Date') }}</label>
                                <span class="col-md-8">{{ $lecture->lecture_start_date }}</span>
                            </div>
                            <div class="row mt-2">
                                <label class="col-md-4">{{ __('Lecture End Date') }}</label>
                                <span class="col-md-8">{{ $lecture->lecture_end_date }}</span>
                            </div>
                            <div class="row mt-2">
                                <label class="col-md-4">{{ __('Use Nickname') }}</label>
                                <span class="col-md-8">{{ $lecture->use_nickname ? 'Use' : 'Not Use' }}</span>
                            </div>
                            <div class="row mt-2">
                                <label class="col-md-4">{{ __('Use Classes') }}</label>
                                <span class="col-md-8">{{ $lecture->use_classes ? 'Use' : 'Not Use' }}</span>
                            </div>
                            @if ($lecture->use_classes)
                                @for ($i = 0; $i < count($lecture->classes); $i++)
                                <div class='row mt-3'>
                                    <label class="col-md-4">{{ $i+1 }}.</label>
                                    <span class="col-md-8">{{ $lecture->classes[$i] }}</span>
                                </div>
                                @endfor
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
