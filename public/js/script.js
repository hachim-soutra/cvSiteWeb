var app = new Vue({
    el: '#app',
    data: {
      message: 'Hello Vue!',
      title : 'open',
      experiences : [],
      formations : [],
      competences: [],
      projets : [],
      open : {
        experience : false,
        formation : false,
        competence : false,
        projet : false,
      },
      edit : {
        experience : false,
        formation : false,
        competence : false,
        projet : false,
      },
      experience : {
            id : 0,
            body : '',
            titre : '',
            cv_id : window.Laravel.idExper,
            debut : '',
            fin : '',
          },
      formation : {
            id : 0,
            body : '',
            college : '',
            diplome : '',
            cv_id : window.Laravel.idExper,
            debut : '',
            fin : '',
        },
       competence  : {
            id : 0,
            competence : '',
            cv_id : window.Laravel.idExper,
          },
       projet : {
            id : 0,
            body : '',
            titte : '',
            photo : '',
            cv_id : window.Laravel.idExper,
        }
      },
      methods : {
        
        addExperience: function () {
          axios.post(window.Laravel.url +'/addexperience',this.experience)
              .then(function(response) {
                
                console.log(response.data)
                if(response.data.etat){
                        this.open = false;
                        //this.experiences.push(this.experience);
            }
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
        
        addformation: function () {
          axios.post(window.Laravel.url +'/addformation',this.formation)
              .then(function(response) {
                
                console.log(response.data)
                if(response.data.etat){
                        this.open.formation = false;
                        //this.experiences.push(this.experience);
            }
                this.formation =  {
                  id : 0,
                  body : '',
                  college : '',
                  diplome : '',
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
        editformation : function(experience){
          this.open.formation = true;
          this.title = 'close';
          this.edit.formation = true;
          this.formation = experience; 
        } ,
        supprimeformation : function(experience){
          axios.delete(window.Laravel.url + '/formations/'+experience.id)
            .then(response => {
              if(response.data.etat){
                var p = this.formations.indexOf(experience);
                this.formations.splice(p , 1);
              }
            })
            .catch(error => {
              console.log(error);
            })
        } ,
        updateformation :  function () {
          axios.put(window.Laravel.url +'/updateformation',this.formation)
            .then(response => {
                this.open.formation = false;
                this.formation = {
                  id : 0,
                  body : '',
                  college : '',
                  diplome : '',
                  cv_id : window.Laravel.idExper,
                  debut : '',
                  fin : '',
                };
              this.edit.formation = false;
              })
            .catch(error => {
              console.log(error);
            })
          },
        
        addprojet: function () {
          axios.post(window.Laravel.url +'/addprojet',this.projet)
              .then(function(response) {
                
                console.log(response.data)
                if(response.data.etat){
                        this.open.projet = false;
                        //this.experiences.push(this.experience);
            }
                this.projet =  {
                  id : 0,
                  body : '',
                  titte : '',
                  photo : '',
                  cv_id : window.Laravel.idExper,
                }
                location.reload();
              })
              .catch(error => {
              console.log(error);
          })
        },
        editprojet : function(experience){
          this.open.projet = true;
          this.title = 'close';
          this.edit.projet = true;
          this.projet = experience; 
        } ,
        supprimeprojet : function(experience){
          axios.delete(window.Laravel.url + '/deleteprojet/'+experience.id)
            .then(response => {
              if(response.data.etat){
                var p = this.projets.indexOf(experience);
                this.projets.splice(p , 1);
                console.log('test')
              }
            })
            .catch(error => {
              console.log(error);
            })
        } ,
        updateprojet :  function () {
          axios.put(window.Laravel.url +'/updateprojet',this.projet)
            .then( _response => {
                this.open.projet = false;
                this.projet = {
                  id : 0,
                  body : '',
                  titte : '',
                  photo : '',
                  cv_id : window.Laravel.idExper,
                };
              this.edit.projet = false;
              })
            .catch(error => {
              console.log(error);
            })
          },
        /*competence*/
        addcompetence: function () {
          axios.post(window.Laravel.url +'/addcompetence',this.competence)
              .then(function(response) {
                
                console.log(response.data)
                if(response.data.etat){
                        this.open.competence = false;
                        //this.experiences.push(this.experience);
            }
                this.competence =  {
                  id : 0,
                  competence : '',
                  cv_id : window.Laravel.idExper,
                }
                location.reload();
              })
              .catch(error => {
              console.log(error);
          })
        },
        editcompetence: function(ex){
          this.open.competence = true;
          this.title = 'close';
          this.edit.competence = true;
          this.competence = ex; 
        } ,
        supprimecompetence : function(experience){
          axios.delete(window.Laravel.url + '/deletecompetence/'+experience.id)
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
        updatecompetence :  function () {
          axios.put(window.Laravel.url +'/updatecompetence',this.competence)
            .then( function(response) {
                this.open.competence = false;
                this.competence = {
                  id : 0,
                  competence : '',
                  cv_id : window.Laravel.idExper,
                };
              this.edit.competence = false;
              })
            .catch(error => {
              console.log(error);
            })
          },
      },
    mounted () { 
      axios.get(window.Laravel.url+'/getdata/'+window.Laravel.idExper)
      .then( response => {                 
        this.experiences = response.data.experiences;  
        this.formations  = response.data.formations;   
        this.competences = response.data.competences;  
        this.projets     = response.data.projets;  
      })
      .catch( error => {
        // handle error
        console.log(error);
      })
    }
  }) ; 
  
  