@section('content')
<a href="{{route('post.create')}}"><button type="button" class="btn btn-primary">Create post</button></a>
<a href="{{url('logout')}}"><button type="button" class="btn btn-secondary">Logout</button></a>
    @if (Session::has('thanhcong'))
        <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
    @elseif (Session::has('suathanhcong'))
    <div class="alert alert-success">{{Session::get('suathanhcong')}}</div>
    @elseif (Session::has('themthanhcong'))
    <div class="alert alert-success">{{Session::get('themthanhcong')}}</div>
    @endif
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Permission</th>
      <th scope="col">Post</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
      @php
      $stt = 1;
      @endphp
      @foreach($listPost as $post)
    <tr>
      <th scope="row">{{ $stt++ }}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->permission}}</td>
      <td>{{$post->post}}</td>
      <td>
          <a href="{{route('post.edit' , $post->id)}}"><button type="button" class="btn btn-warning">Update</button></a>
      </td>
      <td>
          <form action="{{route('post.destroy' , $post->id)}}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa tài khoản này ?')">
          @method('DELETE')
          @csrf
          <button type="submit" class="btn btn-danger">Delete</button>
          </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
@include('layouts.master')