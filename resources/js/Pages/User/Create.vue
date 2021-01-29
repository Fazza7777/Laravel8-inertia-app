<template>
  <div class="container my-5">
      <div class="row  justify-content-center">
          <div class="col-6">
             <h3 class="mb-2">User Create</h3>
             <user-form :user="user" @submit="submit" :errors="errors"></user-form>
          </div>
      </div>

  </div>
</template>

<script>
import UserForm from './UserForm.vue'
export default {
  components: { UserForm },
  props:[ 'errors','user'],
  methods:{
      submit(form){
         this.$inertia.post(`/user`,form)
      }
  }
}
</script>

<style>

</style>
