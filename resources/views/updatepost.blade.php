@section('content')
<form action="{{route('post.update',$listPost->id)}}" method="POST">
    @method('PUT')
    @csrf
<div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{$listPost->title}}">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Permission</label>
    <select class="form-control" id="exampleFormControlSelect1" name="permission">
      @if($listPost->permission == 'Private')
      <option value="Private">Private</option>
      <option value="Public">Public</option>
      @else
      <option value="Public">Public</option>
      <option value="Private">Private</option>
      @endif
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Post</label>
    <textarea class="form-control" name="post" id="exampleFormControlTextarea1" rows="3">{{$listPost->post}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
@include('layouts.master')