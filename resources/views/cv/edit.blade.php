@extends('layouts.app')

@section('title')
cv >>> edit
@endsection

@section('content')
<form action="{{ url('cvs/'.$cv->id) }}" method="post">
    {{ csrf_field()}}
    <input type="hidden" name="_method" value="PUT" >
    <div class="form-group">
      <label for="title">title :</label>
      <input type="text" class="form-control" name="title" id="title" value="{{ $cv->title }}"  placeholder="Enter title ......">
    </div>
    <div class="form-group">
      <label for="photo">photo :</label>
      <input type="file" class="form-control" id="photo"   placeholder="Enter photo ......">
    </div>
    <div class="form-group">
      <label for="text"></label>
      <textarea name="text" id="text"  class="form-control" cols="30" rows="10" placeholder="entre description .....">
        {{ $cv->presentation}} 
      </textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection