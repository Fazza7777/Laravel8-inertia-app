<template>
  <div class="container my-5">
      <div class="row">
          <div class="col-12">
             <h3>User List</h3>
          </div>
           <div class="col-12" v-if="success">
             <div class="alert alert-success">{{success}}</div>
          </div>
      </div>
      <div class="row my-3">
          <div class="col-8">
              <inertia-link href="/user/create" class="btn btn-primary">Create</inertia-link>
          </div>
          <div class="col-4">
              <form @submit.prevent="searching">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="search..." v-model="searchkey">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" >search</button>
                    </div>
                  </div>
              </form>
          </div>
      </div>
      <div class="row">
          <div class="col-12">
              <table class="table">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Date</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr v-for="(user,ind) in users.data" :key="ind">
                          <td>{{user.id}}</td>
                          <td>{{user.name}}</td>
                          <td>{{user.email}}</td>
                          <td>{{user.created_at}}</td>
                          <td>
                              <inertia-link :href="`/user/${user.id}/edit`" class="btn btn-success btn-sm">Edit</inertia-link>
                              <button @click="destroy(user.id)" class="btn btn-danger btn-sm">Delete</button>
                          </td>
                      </tr>
                  </tbody>
              </table>
              <nav aria-label="Page navigation example">
                <ul class="pagination" >
                    <li v-for="(link,ind) in users.links" :key="ind"
                     :class="['page-item',link.url == null ? 'disabled' : '',link.active ? 'active' : '']" >
                        <inertia-link  class="page-link" :href="link.url == null ? '#' : link.url" v-html="link.label"></inertia-link>
                    </li>
                </ul>
            </nav>
          </div>
      </div>
  </div>
</template>

<script>
export default {
  props:['users','success','search'],
  data(){
      return{
          searchkey:this.search
      }
  },
  methods:{
      destroy(id){
          this.$inertia.delete(`/user/${id}`)
      },
      searching(){
          this.$inertia.get(`/user?search=${this.searchkey}`)
      }
  }
}
</script>

<style>

</style>
