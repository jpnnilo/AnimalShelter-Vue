<template>
    <h1 class="header">Animals</h1>
   
    <button type="button" class="btn btn-create" @click="create()"><i class="bi bi-plus-circle-fill"></i> Create </button>

    <div class="row">
        <AnimalCard v-for="animal in animals" :key="animal" :animal="animal" @edit="edit" @delete="destroy"/>
    </div>  
    <Modal @save="save" :animal="animal" :modalTitle="modalTitle"/>

</template>

<script>    
import Modal from './Modal.vue'
import AnimalCard from './AnimalCard.vue'

export default {

    data(){
        return{
            animal:{},
            animals:[],
            modalTitle:'',
        }
    },      
    methods:{

        //show create modal
        create(){
            this.animal = {};
            $('#modal').modal('show');
            this.modalTitle = "Create Animal";
        },

        // create animal 
        store(animal){
            axios.post('/api/animal', {...animal}) //... removes the 'proxy' object (ES6) {object}
            .then(response => {
                console.log('response');
                console.log(response); 
                this.animals.push(response.data.animal);
            })
            .catch(error=>{console.log(error)})
            .finally(() => this.loading = false)
        },

        //show animal details to modal/edit
        edit(id){
            this.modalTitle = "Update Animal";
            axios.get(`api/animal/${id}`)
            .then(response=>{
            (this.animal = response.data.animal); 
            console.log(response.data.animal);
            });
            $('#modal').modal('show');
        },

        //update animal
        update(animal){
           
            let animals_id = (this.animals).map(a => a.id); //  get the animals just ID from object this.animals 
            let animalIndex = animals_id.indexOf(animal.id) // get the animal index 
            // let animals = JSON.parse(JSON.stringify(this.animals.id)); // access proxy object
            axios.put(`/api/animal/${animal.id}`, {...animal})
            .then(response => { 
                console.log(response);
                (this.animals).splice(animalIndex, 1, response.data.animal); // from animal index remove 1 then add the response data
            })
            .catch(error=>{error})  
            
        },

        destroy(id){
            console.log('delete' + id);
            let animals_id = (this.animals).map(a => a.id); //  get the animals just ID from object this.animals 
            let animalIndex = animals_id.indexOf(id) // get the animal index 
            axios.delete(`/api/animal/${id}`)
            .then(response => {
                console.log(response);  
                (this.animals).splice(animalIndex, 1); // from animal index remove 1 then add the response data
                console.log('animal has been deleted');
            })
            .catch(error=>{console.log(error);})
        },

        save(animal){   
        if(animal.id){
            this.update(animal)
        }else{
            this.store(animal)
        }   
        },

    },
    components:{Modal,AnimalCard},
    created() {
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

.btn-edit{
    background-color: #FFE7BF;
}
.btn-edit:hover{
    color: #A10035;
}

.btn-view{
    background-color: #FF869E;
    color:white;
}
.btn-view:hover{
   border-color: #A10035;
}

.btn-delete{
    background-color:#A10035;
    color:#FFE7BF;
}

</style>