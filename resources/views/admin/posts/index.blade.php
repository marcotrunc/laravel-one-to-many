@extends('layouts.app')

@section('content')
  {{-- Header --}}
  <header class="d-flex justify-content-between">
      <h1>Tutti i Post</h1>
      <div>
        <a href="{{route('admin.posts.create')}}" class="btn btn-success d-flex align-content-center">Aggiungi</a>
      </div>
  </header>
  {{-- Table --}}
  <table class="table table-dark mt-4">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">slug</th>
          <th scope="col">Creato il</th>
          <th scope="col">actions</th>
        </tr>
      </thead>
    <tbody>
      @forelse($posts as $post)
        <tr>
          <th scope="row">{{$post->id}}</th>
          <td>{{$post->title}}</td>
          <td>{{$post->slug}}</td>
          <td>{{$post->created_at}}</td>
          <td class="d-flex justify-content-between align-items-center">
          {{-- Show --}}
          <a href="{{route('admin.posts.show',$post->id)}}" class="btn btn-sm btn-info">
            <i class="fa-solid fa-eye"></i></a>
            {{-- Edit --}}
          <a href="{{route('admin.posts.edit',$post->id)}}" class="btn btn-sm btn-warning">
            <i class="fa-solid fa-pencil"></i></a> 
            {{-- Delete --}}
          <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST"  class="delete-form" data-title="{{$post->title}}">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
          </form>
          </td>
        </tr>
      @empty
          <tr>
              <td colspan=""><h3>Non vi sono posts disponibili</h3> </td>
          </tr>
      @endforelse
    </tbody>
  </table>
@endsection
@section('others-script')
<script src="{{asset('js/delete-script.js')}}" defer></script>
@endsection