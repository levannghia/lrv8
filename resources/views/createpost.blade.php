
@section('content')
<form action="{{route('post.store')}}" method="post">
  @csrf
<div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text"  name="title" class="form-control" id="exampleFormControlInput1">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Permission</label>
    <select class="form-control" id="exampleFormControlSelect1" name="permission">
      <option value="Private">Private</option>
      <option value="Public">Public</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Post</label>
    <textarea class="form-control" name="post" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
@include('layouts.master')
