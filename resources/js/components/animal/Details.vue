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
    <h5 class="card-title"><span>Name:</span> {{ animal.name }} </h5>
    <p class="card-text">Age: {{ animal.age }} </p>
    <p class="card-text">Gender: {{ animal.gender }}</p>
    <p class="card-text">Type: {{ animal.type }}</p>
    <p class="card-text">Breed: {{ animal.breed }}</p>
    <p class="card-text">Status: Healthy</p>
    <button type="button" class="btn btn-create"><i class="bi bi-plus-circle"></i> Add Disease </button>
    
  </div>
</div>

</div>
<div class="row">
    <div class="col-lg-3 col-md-4 col-sm-6 my-2" >
            
        <div class="card">
            
            <img src="/images/noImage.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Name</h5>
                <p class="card-text">Age:  </p>
                <p class="card-text">Gender: </p>
                <p class="card-text">Type: </p>
                <p class="card-text">Breed: </p>

               
                <form method="POST" action="" > 
                    <button type="submit" Class="btn btn-delete"><i class="bi bi-trash"></i></button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 my-2" >
            
        <div class="card">
            
            <img src="/images/noImage.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Name</h5>
                <p class="card-text">Age:  </p>
                <p class="card-text">Gender: </p>
                <p class="card-text">Type: </p>
                <p class="card-text">Breed: </p>

                
                <form method="POST" action="" > 
                    <button type="submit" Class="btn btn-delete"><i class="bi bi-trash"></i></button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 my-2" >
            
        <div class="card">
            
            <img src="/images/noImage.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Name</h5>
                <p class="card-text">Age:  </p>
                <p class="card-text">Gender: </p>
                <p class="card-text">Type: </p>
                <p class="card-text">Breed: </p>

                
                <form method="POST" action="" > 
                    <button type="submit" Class="btn btn-delete"><i class="bi bi-trash"></i></button>
                </form>
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
            name:'',
            age:'',
            gender:'',
            type:'',
            breed:'',
        }
    },

    mounted(){
        
        axios.get(`/api/animal/${this.id}`)
        .then(response => {
            console.log(response.data.animal); 
            this.animal = response.data.animal;
            console.log(this.animal);

        })
        .catch(error=> {console.log(error);})
    },
}
</script>

<style scoped>
.row{
    margin-top:20px;
}

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



</style>