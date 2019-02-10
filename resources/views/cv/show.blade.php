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
          <button class="btn btn-outline-primary float-right" @click="open.experience =! open.experience ">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>  @{{ title }}
          </button>
        </h5>
      </div>
  
      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
          <div v-if="open.experience">
              <form enctype="multipart/form-data">
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
                  <button type="button" class="btn btn-primary" v-if="!edit.experience" @click="addExperience">Ajouter</button>
                  <button type="button" class="btn btn-primary"v-else @click="updateExperience">Modifier</button>

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
                          <button class="btn btn-outline-danger float-right"  @click="supprimeExperience(exp)"> 
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
      <div class="card-header " id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne">
            Formation <i class="fa fa-caret-down" aria-hidden="true"></i>
          </button>
          <button class="btn btn-outline-primary float-right" @click="open.formation =! open.formation ">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>  open
          </button>
        </h5>
      </div>
  
      <div id="collapseOne1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
          <div v-if="open.formation">
              <form enctype="multipart/form-data">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="titre">Titre :</label>
                      <input type="text" class="form-control"  placeholder="titre" v-model="formation.college">
                    </div>
                    <div class="form-group col-md-12">
                      <label for="diplome">Titre :</label>
                      <input type="text" class="form-control"  placeholder="titre" v-model="formation.diplome">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="description">description :</label>
                    <textarea class="form-control" v-model="formation.body" placeholder="description...."></textarea>
                  </div>
                  
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="Debut">Date Debut :</label>
                      <input type="date" class="form-control" v-model="formation.debut">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="Fin ">Date Fin :</label>
                      <input type="date" class="form-control" v-model="formation.fin">
                    </div>
                    
                  </div>
                  <button type="button" class="btn btn-primary" v-if="!edit.formation" @click="addformation">Ajouter</button>
                  <button type="button" class="btn btn-primary" v-else @click="updateformation">Modifier</button>

                </form>
          </div>
         <br>
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
                        <div class="col-md-2 text-center" >
                          <br>
                          <button class="btn btn-outline-success float-right"  @click="editformation(exp)"> 
                            <i class="fa fa-pencil" aria-hidden="true"></i> modifier
                          </button>
                        </div>
                        <div class="col-md-2 text-center"> 
                            <br>
                          <button class="btn btn-outline-danger float-right"  @click="supprimeformation(exp)"> 
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
      <div class="card-header" id="headingThree">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Competence 
            <i class="fa fa-caret-down" aria-hidden="true"></i>
          </button>
          <button class="btn btn-outline-primary float-right" @click="open.competence =! open.competence ">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>  open
          </button>
        </h5>
      </div>
  
      <div id="collapseThree" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
          <div v-if="open.competence">
              <form enctype="multipart/form-data">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="competence">competence :</label>
                      <input type="text" class="form-control"  placeholder="competence" v-model="competence.competence">
                    </div>
                  </div>
                  <button type="button" class="btn btn-primary" v-if="!edit.competence" @click="addcompetence">Ajouter</button>
                  <button type="button" class="btn btn-primary" v-else @click="updatecompetence">Modifier</button>

                </form>
          </div>
         <br>
          <ul class="list-group">
            <li class="list-group-item" v-for="exp in competences" v-bind:key="exp.id" >
                    <div class="row ">
                        <div class="col-md-8 " >
                            <h2> @{{ exp.competences}} </h2>                          
                        </div>
                        <div class="col-md-2 text-center" >
                          <br>
                          <button class="btn btn-outline-success float-right"  @click="editcompetence(exp)"> 
                            <i class="fa fa-pencil" aria-hidden="true"></i> modifier
                          </button>
                        </div>
                        <div class="col-md-2 text-center"> 
                            <br>
                          <button class="btn btn-outline-danger float-right"  @click="supprimecompetence(exp)"> 
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
            <div class="card-header" id="heading">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapsee" aria-expanded="true" aria-controls="collapse">
                    projet
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                  </button>
                  <button class="btn btn-outline-primary float-right" @click="open.projet =! open.projet ">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>  open
                  </button>
                </h5>
              </div>
          
              <div id="collapsee" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                  <div v-if="open.projet">
                      <form enctype="multipart/form-data">
                          <div class="form-row">
                            <div class="form-group col-md-12">
                              <label for="title">Titre :</label>
                              <input type="text" class="form-control"  placeholder="titre" v-model="projet.title">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="body">description :</label>
                            <textarea class="form-control" v-model="projet.body" placeholder="description...."></textarea>
                          </div>
                          <div class="form-group">
                              <label for="photo">photo :</label>
                              <input type="file" class="form-control" v-model="projet.photo" placeholder="Enter photo ......">
                            </div>
                          
                          <button type="button" class="btn btn-primary" v-if="!edit.projet" @click="addprojet">Ajouter</button>
                          <button type="button" class="btn btn-primary" v-else @click="updateprojet">Modifier</button>
        
                        </form>
                  </div>
                 <br>
                  <ul class="list-group">
                    <li class="list-group-item" v-for="exp in projets" v-bind:key="exp.id" >
                            <div class="row ">
                                <div class="col-md-8 " >
                                  
                                    <h2> @{{ exp.title}} </h2>           
                                    <p class="text-primary">  @{{ exp.body}}</p>
                                </div>
                                <div class="col-md-2 text-center" >
                                  <br>
                                  <button class="btn btn-outline-success float-right"  @click="editprojet(exp)"> 
                                    <i class="fa fa-pencil" aria-hidden="true"></i> modifier
                                  </button>
                                </div>
                                <div class="col-md-2 text-center"> 
                                    <br>
                                  <button class="btn btn-outline-danger float-right"  @click="supprimeprojet(exp)"> 
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