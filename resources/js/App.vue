<template>
     <nav class="navbar navbar-expand-lg">
        <div class="container">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto ">
              <li class="nav-item">
                <router-link class="nav-link active" aria-current="page" :to="{name: 'home'}">Home</router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'animalIndex' }">Animal</router-link>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Adopter</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Rescuer</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Admin
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
        
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <ul class="navbar-nav m-2">
               <button class="btn login" type="submit">Login</button>
            </ul>
          </div>
        
        </div>
    </nav>

    <div class="container">
        <router-view></router-view>
    </div>
    

</template>


<script>


export default {
    data(){
        return{
           
        }
    },
    methods:{
      
    }

}
</script>


<style scoped>
h1{
    text-align: center;
    color: #A10035;
}
</style>