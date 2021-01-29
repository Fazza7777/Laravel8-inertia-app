<template>
   <form @submit.prevent="submit">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text"
            v-model="form.name"
            class="form-control"
            :class="{'is-invalid':errors.name}">
            <div class="invalid-feedback" v-if="errors.name">{{errors.name}}</div>
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email"
            v-model="form.email"
            class="form-control"
            :class="{'is-invalid':errors.email}">
            <div class="invalid-feedback" v-if="errors.email">{{errors.email}}</div>
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password"
            v-model="form.password"
            :class="{'is-invalid':errors.password}"
            class="form-control">
            <div class="invalid-feedback" v-if="errors.password">{{errors.password}}</div>
        </div>
        <inertia-link href='/user' class="btn btn-outline-secondary mr-3">Back</inertia-link>
        <button type="submit" class="btn btn-info"> Save</button>
    </form>
</template>

<script>
export default {
  props:['user','errors'],
  data(){
      return{
          form:{
              name:this.user.name,
              email:this.user.email,
              password:''
          }
      }
  },
  methods:{
      submit(){
          this.$emit('submit',this.form)
      }
  }
}
</script>

<style>

</style>
