@extends('layouts.app')

@section('title')
cv >>> index
@endsection

@section('content')
    <div class="container">
            @if(session()->has('succes'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('succes') }}
                </div>
            @endif
                
        <h2>list cvs</h2>

        <a class="float-right" href="{{url('cvs/create')}} "><i class="fa fa-plus-circle" aria-hidden="true"></i> ajouter nouveau cv</a>
        <br>
        <div class="row">
          @foreach ($cvs as $cv )
            
            <div class="col-sm-6 col-md-4  mt-4">
                <div class="card text-center">
                    <img class="card-img-top" height="250px" class="img-thumbnail" src="{{ asset('storage/'.$cv->photo) }}" alt="... ">
                    <div class="card-block">
                        <h5 class="text-bold">{{$cv->title}}</h5>
                        <p> {{$cv->presentation}} <br> create by: {{ $cv->user->name }}</p>   
                        <form action="{{ url('cvs/'.$cv->id) }}" method="post">
                         {{ csrf_field() }}
                         {{ method_field('DELETE')}}
                         <a class="btn btn-light" href="{{ url('cvs/'.$cv->id) }}"> Show</a>
                         @can('update', $cv)
                         <a class="btn btn-primary" href="{{ url('cvs/'.$cv->id.'/edit') }}"> Edit</a>
                         @endcan
                         @can('delete', $cv)
                           <button class="btn btn-danger" type="submit"> Delete</button>
                         @endcan
                        </form>
                        
                        
                    </div>
                </div>
            </div>
          @endforeach
        </div>
    </div>   
@endsection