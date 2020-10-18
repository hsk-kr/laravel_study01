@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>sdfsfsf</h1>


            <form method="POST" action="{{ route('blogs.create') }}">
                @csrf
                <input type="text" name="userId"><br>
                <input type="text" name="userPw"> 
                <button>저장</button>    
            </form>
        </div>
    </div>
</div>
@endsection
