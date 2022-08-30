<template>

<h1 class="header">Animal Details</h1>
    
<div class="head-card">
    <div class="card">
        <div class="card-header">
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">

                <div class="carousel-inner" >

                    <div class="carousel-item active" data-bs-interval="3000">
                        <img src="/images/noImage.jpg" class="d-block w-75  mx-auto carousel-img" alt="...">
                        
                        </div>

                    <div class="carousel-item " data-bs-interval="3000">
                        <img src="/images/animal1.jpg" class="d-block w-75  mx-auto carousel-img" alt="...">
                        
                        </div>
                </div>
                <button class="carousel-control-prev carousel-button" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next carousel-button" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ animal.name }} </h5>
            <p class="card-text">Age: {{ animal.age }} </p>
            <p class="card-text">Gender: {{ animal.gender }}</p>
            <p class="card-text">Type: {{ animal.type }}</p>
            <p class="card-text">Breed: {{ animal.breed }}</p>
            <p class="card-text">Status: <span v-if="!animalDiseases.length">Healthy</span> <span v-if="animalDiseases.length">Sick</span></p>
            <button type="button" class="btn btn-create" @click="create"><i class="bi bi-plus-circle"></i> Add Disease </button>
            
        </div>
    </div>
</div>

<div class="modal fade" id="modal" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >{{ modalTitle }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form @submit.prevent="save">

            <input type="hidden" v-model="animal.id">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" v-model="animal.name" disabled>
            </div>
            
            <label class="form-label">Disease</label>
            <select class="form-select" v-model="animal.disease" >
                <option value="">--Please select type--</option>
                <option v-for="modalDisease in modalDiseases" :key="modalDisease" :value="modalDisease.id">{{ modalDisease.name }}</option>
            </select>

           
            
        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-store" @click="addDisease(animal.id)">Save changes</button>
       </form>
      </div>
      <div class="modal-footer">
       

         
      </div>
    </div>
  </div>
</div>



<h3 class="header-disease" v-if="animalDiseases.length">Animal Diseases</h3>

<div class="row">
    <div class="col-lg-3 col-md-4 col-sm-6 my-2" v-for="animalDisease in animalDiseases" :key="animalDisease">
            
        <div class="card disease-card">
            
            <div class="card-body">
                <h5 class="card-title">{{ animalDisease.name }}</h5>
                <p class="card-text">Description: {{ animalDisease.description }}</p>
                <button type="submit" Class="btn btn-delete" @click.stop="removeDisease(animalDisease.id)"><i class="bi bi-trash"></i></button>
                
            </div>
        </div>  
    </div>  

</div>

   <!-- <div class="row">
        <div class="col-lg-3 ">
            <div class="card " id="card-details" style="width: 18rem;">
        
                <img src="/images/noImage.jpg">      
                <div class="card-body">
                    <h5 class="card-title"><span>Name:</span> {{ animal.name }} </h5>
                     <p class="card-text">Age: {{ animal.age }} </p>
                    <p class="card-text">Gender: {{ animal.gender }}</p>
                    <p class="card-text">Type: {{ animal.type }}</p>
                    <p class="card-text">Breed: {{ animal.breed }}</p>
                    <p class="card-text">Status: Healthy</p>
                    
                </div>
              </div>

        </div>
        <div class="col-lg-9">
           

            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
       
                <div class="carousel-inner" >
        
                    <div class="carousel-item active" data-bs-interval="3000">
                        <img src="/images/noImage.jpg" class="d-block w-75  mx-auto carousel-img" alt="...">
                       
                      </div>
        

                    <div class="carousel-item " data-bs-interval="3000">
                        <img src="/images/animal1.jpg" class="d-block w-75  mx-auto carousel-img" alt="...">
                       
                      </div>
                    
        
                 
                </div>
                <button class="carousel-control-prev carousel-button" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next carousel-button" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
    </div> -->

  


</template>

<script>
export default{
    props:['id'],
    data(){
        return {
            animal:[],
            animalDiseases:[],
            modalDiseases:[],
            modalTitle:'Add Disease',
        }
    },
    methods:{

        showDetails(){
             axios.get(`/api/animal/${this.id}`)
        .then(response => {
            console.log(response.data); 
            this.animal = response.data.animal;
            this.animalDiseases = response.data.animal.diseases;
            this.modalDiseases = response.data.disease;
        })
        .catch(error=> {console.log(error);})
        },

        create(){
            $('.modal').modal('show');
        },

        addDisease(id){
            axios.post(`/api/animal/disease/${id}`, {disease: this.animal.disease})
            .then(response => {

                console.log(response);
                (this.animalDiseases).push(response.data.disease); 
                let arrDiseaseId = (this.modalDiseases).map(a => a.id); // get disease id from modal
                let diseaseIndex = arrDiseaseId.indexOf(response.data.disease.id); // get index 
                (this.modalDiseases).splice(diseaseIndex, 1); // remove the disease from modal

            })
            .catch(error => {console.log(error)})
            
        },
        
        removeDisease(disease_id){

            // push the deleted disease back to modal
            let arrDiseaseId = (this.animalDiseases).map(a => a.id);
            let diseaseIndex = arrDiseaseId.indexOf(disease_id); 
            (this.modalDiseases).push(this.animalDiseases[diseaseIndex]);

            axios.delete(`/api/animal/disease/${this.animal.id}`, {data: {disease_id : disease_id}})
            .then(response => {
                console.log(response);
                
                //removing the disease from the array
                let arrDiseaseId = (this.animalDiseases).map(a => a.id);
                let diseaseIndex = arrDiseaseId.indexOf(disease_id);
                (this.animalDiseases).splice(diseaseIndex, 1);
                
            })
            .catch(error => {console.log(error)})    
        },
    },

    mounted(){
        //show animal details AnimalController show(id)
        this.showDetails();
    },

}
</script>

<style scoped>

.header-disease{
    text-align: center;
    margin: 30px 0 10px;
    font-weight: bold;
    color: #A10035;
}

p{
    margin:0;
}

h5{
    font-weight: bold;
}

.disease-card .card-text{
    overflow: scroll;
}

.disease-card .card-text{
    height: 200px;
}

.btn{
    margin: 5px 3px;
}

.head-card #card-details{
    margin: 0px auto 20px;
}

.head-card .card{
    margin:0 auto;
    background-color:#FFC4C4;
    height: 770px;
    width: 500px;
}

.head-card .card-body{
    color: #A10035;
}

.disease-card{
 background-color: #FF869E;
 color:#FFE7BF;
}

.btn-create{
    margin:10px 0;
     background-color: #FF869E;
    color:white;
    font-weight:bold;

}

.btn-view{
    background-color: #FFE7BF;
}
.btn-view:hover{
    color: #A10035;
}

.btn-edit{
    background-color: #FF869E;
    color:white;
}

.btn-delete{
    background-color:#A10035;
    color:#FFE7BF;
}

.carousel-button{
    margin: auto -3%;
}
.carousel-inner{
    margin-top: 20px;
    width:100%; height: 500px;
}

.carousel-img{
    height: 30em;
}

::-webkit-scrollbar {
  width: 2px;
  background:#FF869E;
}

/* Track */
::-webkit-scrollbar-track {
  background: #FF869E; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #FFC4C4; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #FF869E; 
}

::-webkit-scrollbar-corner{
     background: #FF869E; 
}

</style>