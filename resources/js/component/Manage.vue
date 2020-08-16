<template>
  <div class="card card-small mb-4">
    <div class="card-header border-bottom">
      <h6 class="m-0 fr-upper">{{ type }}</h6>
    </div>

    <div class="card-body p-0 text-center">
      <div class="table-responsive">
        <table class="table mb-0">
          <thead class="bg-light" v-if="type === 'posts'">
          <tr>
            <th scope="col" class="border-0">#</th>
            <th scope="col" class="border-0 ">Title</th>
            <th scope="col" class="border-0">Summary</th>
            <th scope="col" class="border-0">Status</th>
            <th scope="col" class="border-0">Last Update</th>
            <th scope="col" class="border-0">Action</th>
          </tr>
          </thead>
          <thead class="bg-light" v-else>
          <tr>
            <th scope="col" class="border-0">#</th>
            <th scope="col" class="border-0 ">Description</th>
            <th scope="col" class="border-0">Price</th>
            <th scope="col" class="border-0">Status</th>
            <th scope="col" class="border-0">Last Update</th>
            <th scope="col" class="border-0">Action</th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="items in postManage">
            <td class="p-4">{{ items.id }}</td>
            <td class="p-4">{{ type === 'posts' ? items.title.substr(0,20) : items.description}}... </td>
            <td class="p-4">{{ type === 'posts' ? items.summary.substr(0,40)+'...' : items.price+'$' }}</td>
            <td class="p-4">Publish</td>
            <td class="p-4">{{ items.updated_at}}</td>
            <td class="p-4">
              <div class="btn btn-group">
                <a :href="`${show}/${type === 'posts' ? items.id : ''}`" class="btn btn-sm btn-transparent" style="margin-top:-10px !important;"><i class="material-icons font-30 blue">visibility</i></a>
                <button class="btn btn-sm btn-transparent" @click="HandleSubmitDelete(items.id,type)" style="margin-top:-10px !important;"><i class="material-icons font-30 red">delete_outline</i></button>
              </div>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</template>

<script>

export default {
  name: "Manage",
  props:['route','token','delete','type','show'],
  data(){
    return {
      postManage:[]
    }
  },
  mounted() {
    axios.get(this.route).then((response)=>{
      this.type === 'posts' ? this.postManage = response.data.posts : this.postManage = response.data.products
    }).catch(error=>{
      console.log(error)
    })
  },
  methods: {

    HandleSubmitDelete: function (id,type) {
      this.$swal("Are you sure?", "Once deleted, you will not be able to recover that", "warning").
      then(()=>{
        axios.post(`${this.delete}/${id}/${type}`,{
          _token:this.token,
          _method:'PUT'
        }).then((response)=>{
          this.$swal("Good job!", "Your request has been completed", "success");
          this.postManage = this.postManage.filter(e=>{
            return e.id !== id
          });
        }).catch(function (error) {
          console.log(error.response);
        });

      });

    }

  }

}

</script>

<style scoped>

  .fr-upper::first-letter{
    text-transform:uppercase;
  }

  .btn-transparent{
    background-color:#fff;
  }

  .font-30{
    font-size:30px !important;
  }

  .red{
    color:#c4183c !important;
  }

  .blue{
    color:#0080FF !important;
  }

</style>
