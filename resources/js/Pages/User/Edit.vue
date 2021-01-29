<template>
  <div class="container my-5">
      <div class="row  justify-content-center">
          <div class="col-6">
             <h3 class="mb-2">User Edit</h3>
             <user-form :user="user" :errors="errors" @submit="submit"></user-form>
          </div>
      </div>

  </div>
</template>

<script>
import UserForm from './UserForm.vue'
export default {
  components: { UserForm },
  props:['user','errors'],
  methods:{
      submit(form){
         this.$inertia.put(`/user/${this.user.id}`,form)
      }
  }
}
</script>

<style>

</style>
