<template>
    
</template>

<script>
    export default {
        
        data : {
          message: 'Hello Vue!',
          title : 'open',
          competences : [],
          open : false,
          edit : false,
         competence : {
                  id : 0,
                  body : '',
                  titre : '',
                  cv_id : window.Laravel.idExper,
                  debut : '',
                  fin : '',
              }
        },
        methods : {
          addExperience: function () {
            axios.post(window.Laravel.url +'/competences',this.competence)
                .then(function(response) {
                  
                  console.log(response.data.id);
                  this.open = false;
                  this.competence =  {
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
            this.competence = experience; 
          } ,
          supprimeExperience : function(experience){
            axios.delete(window.Laravel.url + '/competences/'+experience.id)
              .then(response => {
                if(response.data.etat){
                  var p = this.competences.indexOf(experience);
                  this.competences.splice(p , 1);
                  console.log('test')
                }
              })
              .catch(error => {
                console.log(error);
              })
          } ,
          updateExperience :  function () {
            axios.put(window.Laravel.url +'/updatecompetences',this.editExperiencecompetence)
              .then(response => {
                  this.open = false;
                  this.competence = {
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
</script>
