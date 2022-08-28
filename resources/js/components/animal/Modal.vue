<template>


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
                <input type="text" class="form-control" v-model="animal.name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Age</label>
                <input type="text" class="form-control" v-model="animal.age" required>
            </div> 

          
            <label class="form-label">Gender:</label>
            <div class="mb-3">
            <div class="form-check">
                <input type="radio" class="form-check-input" name="gender" v-model="animal.gender" value="Male" >Male
                <label class="form-check-label" for="radio1"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="gender" v-model="animal.gender" value="Female">Female
                <label class="form-check-label" for="radio2"></label>
            </div>
            </div>
            <label class="form-label">Type</label>
            <select class="form-select" v-model="animal.type">
                <option value="">--Please select type--</option>
                <option>Dog</option>
                <option>Cat</option>
            </select>

            <div class="mb-3">
                <label class="form-label">Breed</label>
                <input type="text" class="form-control" v-model="animal.breed">
            </div>

            <!-- <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Image Upload:  </label>
                <input type="file" class="form-control" name="images[]" multiple>
            </div> -->
            
        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-store" >Save changes</button>
       </form>
      </div>
      <div class="modal-footer">
       

         
      </div>
    </div>
  </div>
</div>


</template>


<script>
export default {
    props:['animal','modalTitle'],
    data(){
        return{
            
        }
    },
    methods:{
        save(){
             this.$emit('save', this.animal);
        },
    },
    

}
</script>


<style scoped>

.modal-content{
    background-color:#FFC4C4;
    color: #A10035;
    font-weight:bold;
}

.modal-title{
      color: #A10035;
    font-weight:bold;
}

.btn{
    background-color: #FFE7BF;
    margin: 3px;
}


</style>