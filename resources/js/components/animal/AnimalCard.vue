<template>
    <div class="col-lg-3 col-md-4 col-sm-6 my-2">
        <div class="card">
            <img src="/images/noImage.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{animal.name}}</h5>
                <p class="card-text">Age: {{ animal.age }} </p>
                <p class="card-text">Gender: {{ animal.gender }}</p>
                <p class="card-text">Type: {{ animal.type }}</p>
                <p class="card-text">Breed: {{ animal.breed }}</p>

                <router-link :to="{name: 'AnimalDetails', params: {id:animal.id}}"><button type="button" Class="btn btn-view"><i class="bi bi-eye"></i></button></router-link>
                
                <button type="button" Class="btn btn-edit" @click="this.$emit('edit', animal.id)"><i class="bi bi-pencil-square"></i></button>
                <button type="button" Class="btn btn-delete" @click="this.$emit('delete', animal.id)"><i class="bi bi-trash"></i></button>
            </div>
        </div>
    </div>

</template>



<script>
export default {
    props:['animal'],
    mounted(){
        console.log(this.animal);  
    },
}
  
</script>


<style scoped>
    .card{
    background-color:#FFC4C4;
}

.card-body{
    color: #A10035;
}


p{
    margin:0;
    font-weight:bold;
}

h5{
    font-weight: bold;
}


.btn{
    margin: 5px 3px;
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