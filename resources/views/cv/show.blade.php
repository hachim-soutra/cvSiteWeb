@extends('layouts.app')
@section('title')
cv show
@endsection

@section('content')
<div class="container" id="app">
  <div class="jumbotron">
    <h2> @{{message }} </h2>
    
  </div>
  <div id="accordion">
    <div class="card">
      <div class="card-header " id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Experience <i class="fa fa-caret-down" aria-hidden="true"></i>
          </button>
          <button class="btn btn-outline-primary float-right" @click="open =! open">
            <i class="fa fa-plus-circle" aria-hidden="true"></i> Ajouter
          </button>
        </h5>
      </div>
  
      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
          <div v-if="open">
              <form>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="titre">Titre :</label>
                      <input type="text" class="form-control" id="titre" name="titre" placeholder="titre" v-model="experience.titre">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="description">description :</label>
                    <textarea class="form-control" id="description" name="description" v-model="experience.body" placeholder="description...."></textarea>
                  </div>
                  
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="Debut">Date Debut :</label>
                      <input type="date" class="form-control" id="debut" name="debut" v-model="experience.debut">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="Fin ">Date Fin :</label>
                      <input type="date" class="form-control" id="fin" name="fin" v-model="experience.fin">
                    </div>
                    
                  </div>
                  <button type="button" class="btn btn-primary" v-if="!edit" @click="addExperience">Ajouter</button>
                  <button type="button" class="btn btn-primary"v-else @click="editExperience">Modifier</button>

                </form>
          </div>
         <br>
          <ul class="list-group">
            <li class="list-group-item" v-for="exp in experiences" >
                    <div class="row ">
                        <div class="col-md-8 " >
                          
                            <h2> @{{ exp.titre}} </h2>                          
                            <p class="text-primary">  @{{ exp.body}}</p>
                            <small>- debut : @{{exp.debut	}} - fin : @{{exp.fin}}</small>
                        </div>
                        <div class="col-md-2 text-center" >
                          <br>
                          <button class="btn btn-outline-success float-right"  @click="editExperience(exp)"> 
                            <i class="fa fa-pencil" aria-hidden="true"></i> modifier
                          </button>
                        </div>
                        <div class="col-md-2 text-center"> 
                            <br>
                          <button class="btn btn-outline-danger float-right"  @click="editExperience()"> 
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer
                            </button>
                        </div>
                    </div>
             
            </li>
          </ul>
        </div>
      </div>
    </div>
    <br>
    <div class="card">
      <div class="card-header" id="headingTwo">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Portefolio
          </button>
          <button class="btn btn-succes float-right">ajouter</button>
        </h5>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
        </div>
      </div>
    </div>
    <br>
    <div class="card">
      <div class="card-header" id="headingThree">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Competence 
          </button>
          <button class="btn btn-succes float-right">ajouter</button>
        </h5>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body">
        </div>
      </div>
    </div>
    <br>
    <div class="card">
            <div class="card-header" id="heading">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapsee" aria-expanded="true" aria-controls="collapse">
                    Formation
                </button>
                <button class="btn btn-default float-right">ajouter</button>
              </h5>
            </div>
        
            <div id="collapsee" class="collapse " aria-labelledby="heading" data-parent="#accordion">
              <div class="card-body">
                <ul class="list-group">
                  <li class="list-group-item">Cras justo odio</li>
                  <li class="list-group-item">Dapibus ac facilisis in</li>
                  <li class="list-group-item">Morbi leo risus</li>
                  <li class="list-group-item">Porta ac consectetur ac</li>
                  <li class="list-group-item">Vestibulum at eros</li>
                </ul>
              </div>
            </div>
          </div>
    </div>

  </div>
@endsection
@section('javascript')
   <script src="{{ asset('js/vue.js') }}"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <script>
    window.Laravel = {!! json_encode([
      'csrfToken'  => csrf_token(),
      'idExper'    => $id,
      'url'        => url('/')
    ])!!}
  </script>
  <script>
  var app = new Vue({
        el: '#app',
        data: {
          message: 'Hello Vue!',
          experiences : [],
          open : false,
          edit : false,
          experience : {
                  id : 0,
                  body : '',
                  titre : '',
                  cv_id : window.Laravel.idExper,
                  debut : '',
                  fin : '',
              }
          },
          mounted () { 
            axios.get(window.Laravel.url+'/getexperiences/'+window.Laravel.idExper)
            .then( response => {                 
              this.experiences = response.data;   
            })
            .catch( error => {
              // handle error
              console.log(error);
            })
          },
        methods : {
          addExperience: function () {
            axios.post(window.Laravel.url+'/addexperience', this.experience)
                .then(function(response) {
                  console.log(response);
                  /*if(response.data.etat){
                    this.open = false;
                    this.experience.id = response.data.id;
                    this.experiences.unshift(this.experience);
                  }
                  else{
                    console.log('ttttt');
                  }*/
                })
                .catch(error => {
                console.log(error);
            });
          },
          editExperience : function(experience){
            this.open = true;
            this.edit = true;
            this.experience = experience; 
          } ,
          updateExperience :  function () {
            axios.put(window.Laravel.url + '/updateexperience', this.experience)
              .then(response => {
                if(response.data.etat){
                  this.open = false;
                  this.experience = {
                    id : 0,
                    body : '',
                    titre : '',
                    cv_id : window.Laravel.idExper,
                    debut : '',
                    fin : '',
                  };
                }
                this.edit = false;
                })
              .catch(error => {
                console.log(error);
              })
            }
          } 
        });   
  </script>
@endsection