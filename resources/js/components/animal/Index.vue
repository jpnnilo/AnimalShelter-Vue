<template>
    <h1 class="header">Animals</h1>
    
   
        <button type="button" class="btn btn-create"><i class="bi bi-plus-circle-fill"></i> Create </button>


    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6 my-2" v-for="data in animals" :key="data.id">
             
            <div class="card">
                
                <img src="/images/noImage.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{data.name}}</h5>
                    <p class="card-text">Age: {{ data.age }} </p>
                    <p class="card-text">Gender: {{ data.gender }}</p>
                    <p class="card-text">Type: {{ data.type }}</p>
                    <p class="card-text">Breed: {{ data.breed }}</p>

                    <router-link :to="{name: 'AnimalDetails', params: {id:data.id}}"><button type="button" Class="btn btn-view"><i class="bi bi-eye"></i></button></router-link>
                    
                    <a href=""><button type="button" Class="btn btn-edit"><i class="bi bi-pencil-square"></i></button></a>
                    <form method="POST" action="" > 
                        <button type="submit" Class="btn btn-delete"><i class="bi bi-trash"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="create">
        
    </div>
    
    

    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form >
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<Modal></Modal>

</template>

<script>
import Modal from './Modal.vue'


export default {
    // props:['animals'],
    data(){
        return{
            animals:[],
        }
    },
    methods:{
        
    },
    components:{Modal},

    mounted() {
        //get all animals
        // none ES6 
        // const self = this;
        axios.get('/api/animal')
        //ES6 arrow function
        .then(response => {this.animals = response.data.animals; console.log(response.data.animals)})
        // none ES6
        // .then(function(response){
        //   self.animals = response.data.animal
        // })
        .catch(error => {console.log(error)})
    },
}
</script>



<style scoped>
p{
    margin:0;
    font-weight:bold;
}

h5{
    font-weight: bold;
}


form{
    display:inline-block;
}

.btn{
    margin: 5px 3px;
}

.card{
    background-color:#FFC4C4;
}

.card-body{
    color: #A10035;
}



.btn-create{
    margin: 10px auto;
    background-color:#FFC4C4;
    color: #A10035;
    display:block;
    font-weight: bold;

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


   

</style>