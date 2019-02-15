@extends('layouts.app')
@section('title')
cv sh
@endsection

@section('content')
<div class="container" id="app">
  <div class="jumbotron">
    <h2> showwww </h2>
    
  </div>
  <div id="accordion">
    <div class="card">
      <div class="card-header " id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Experience <i class="fa fa-caret-down" aria-hidden="true"></i>
          </button>
          
        </h5>
      </div>
  
      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
          
          <ul class="list-group">
            <li class="list-group-item" v-for="exp in experiences" >
                    <div class="row ">
                        <div class="col-md-8 " >
                          
                            <h2> @{{ exp.titre}} </h2>                          
                            <p class="text-primary">  @{{ exp.body}}</p>
                            <small>- debut : @{{exp.debut	}} - fin : @{{exp.fin}}</small>
                        </div>
                    </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <br>
   
    <div class="card">
      <div class="card-header " id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne">
            Formation <i class="fa fa-caret-down" aria-hidden="true"></i>
          </button>
        </h5>
      </div>
  
      <div id="collapseOne1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
         
          <ul class="list-group">
            <li class="list-group-item" v-for="exp in formations" v-bind:key="exp.id" >
                    <div class="row ">
                        <div class="col-md-8 " >
                          
                            <h2>College : @{{ exp.college}} </h2> 
                            <p class="text-primary" >
                              Dipolma :  @{{ exp.diplome}} <br>
                              Description :   @{{ exp.body}}
                            </p>
                             
                            <small>- debut : @{{exp.debut	}} - fin : @{{exp.fin}}</small>
                        </div>
                        
                    </div>
             
            </li>
          </ul>
        </div>
      </div>
    </div>    
    <br>
    <div class="card">
      <div class="card-header" id="headingThree">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Competence 
            <i class="fa fa-caret-down" aria-hidden="true"></i>
          </button>
          
        </h5>
      </div>
  
      <div id="collapseThree" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
         
          <ul class="list-group">
            <li class="list-group-item" v-for="exp in competences" v-bind:key="exp.id" >
                    <div class="row ">
                        <div class="col-md-8 " >
                            <h2> @{{ exp.competences}} </h2>                          
                        </div>
                       
                    </div>
             
            </li>
          </ul>
        </div>
      </div>
    </div>    
    <br>
    <div class="card">
            <div class="card-header" id="heading">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapsee" aria-expanded="true" aria-controls="collapse">
                    projet
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                  </button>
                  
                </h5>
              </div>
          
              <div id="collapsee" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                  
                  <ul class="list-group">
                    <li class="list-group-item" v-for="exp in projets" v-bind:key="exp.id" >
                            <div class="row ">
                                <div class="col-md-8 " >
                                  
                                    <h2> @{{ exp.title}} </h2>           
                                    <p class="text-primary">  @{{ exp.presentation}}</p>
                                </div>
                                
                            </div>
                     
                    </li>
                  </ul>
                </div>
              </div>
            </div>    
            <br>

  </div>
@endsection
@section('javascript')
 

 <script src="https://cdn.jsdelivr.net/npm/vue"></script>
 <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
 
 <script>
    window.Laravel = {!! json_encode([
      'csrfToken'  => csrf_token(),
      'idExper'    => $id,
      'url'        => url('/')
    ])!!}
 </script>
 <script src="{{ asset('js/script.js') }}"></script>
@endsection