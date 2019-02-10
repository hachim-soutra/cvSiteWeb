
<template>
    <div class="card">
      <div class="card-header " id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Experience <i class="fa fa-caret-down" aria-hidden="true"></i>
          </button>
          <button class="btn btn-outline-primary float-right" @click="open =! open ">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>  @{{ title }}
          </button>
        </h5>
      </div>
  
      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
          <div v-if="open">
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
                  <button type="button" class="btn btn-primary" v-if="!edit" @click="addExperience">Ajouter</button>
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
</template>

<script>
    export default {
       export default {
        
        data: {
          message: 'Hello Vue!',
          title : 'open',
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
              },
          },
          methods : {
            addExperience: function () {
              axios.post(window.Laravel.url +'/experiences',this.experience)
                  .then(function(response) {
                    
                    console.log(response.data.id);
                    this.open = false;
                    this.experience =  {
                      id : 0,
                      body : '',
                      titre : '',
                      cv_id : window.Laravel.idExper,
                      debut : '',
                      fin : '',
                    }
                    location.reload();
                  })
                  .catch(error => {
                  console.log(error);
              })
            },
            editExperience : function(experience){
              this.open = true;
              this.title = 'close';
              this.edit = true;
              this.experience = experience; 
            } ,
            supprimeExperience : function(experience){
              axios.delete(window.Laravel.url + '/experiences/'+experience.id)
                .then(response => {
                  if(response.data.etat){
                    var p = this.experiences.indexOf(experience);
                    this.experiences.splice(p , 1);
                    console.log('test')
                  }
                })
                .catch(error => {
                  console.log(error);
                })
            } ,
            updateExperience :  function () {
              axios.put(window.Laravel.url +'/updateexperiences',this.experience)
                .then(response => {
                    this.open = false;
                    this.experience = {
                      id : 0,
                      body : '',
                      titre : '',
                      cv_id : window.Laravel.idExper,
                      debut : '',
                      fin : '',
                    };
                  this.edit = false;
                  })
                .catch(error => {
                  console.log(error);
                })
              },
          },
        mounted() {
           axios.get(window.Laravel.url+'/getexperiences/'+window.Laravel.idExper)
          .then( response => {                 
            this.experiences = response.data;   
          })
          .catch( error => {
            // handle error
            console.log(error);
          })
    }
    }
    }
</script>
