@extends('layouts.app')
@section('content')
<div class="row">
    <section class="col-12 d-flex justify-content-center">
        <div class="card" style="width: 18rem;">
            <img src="{{$post->image}}" class="card-img-top" alt="{{$post->title}}">
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{$post->content}}</p>
                <div class="d-flex justify-content-around">
                     <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-sm btn-warning">
                        <i class="fa-solid fa-pencil"></i>
                    </a> 
                    <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST" class="delete-form">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash mr-2"></i><span>Cancel</span></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('others-script')
<script src="{{ asset('js/delete-script.js') }}" defer></script>
@endsection