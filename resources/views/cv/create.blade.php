@extends('layouts.app')

@section('title')
cv >>> add
@endsection

@section('content')
<form action="{{ url('cvs') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field()}}
      <div class="form-group">
        <label for="title">title :</label>
        <input type="text" class="form-control" name="title" id="title" required  placeholder="Enter title ......">
      </div>
      <div class="form-group">
        <label for="photo">photo :</label>
        <input type="file" class="form-control" id="imgUpload1" name="imgUpload1" placeholder="Enter photo ......">
      </div>
      <div class="form-group">
        <label for="text"></label>
        <textarea name="text" id="text"  class="form-control" cols="30" rows="10" placeholder="entre description ....."></textarea>
      </div>
      
      <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection