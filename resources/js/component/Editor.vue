<template>
  <div class="row">
    <div class="col-lg-9 col-md-12">
      <div class="card card-small mb-3">
        <div class="card-body">
          <form class="add-new-post">
            <input class="form-control form-control-lg mb-3" maxlength="200" v-model="title" type="text" placeholder="Your Post Title">
            <div class="input-group mb-3">
              <input class="form-control form-control-lg " maxlength="200" v-model="summary" type="text" placeholder="Perform a quick summary">
              <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2">{{summary.length}}/200</span>
              </div>
            </div>
            <vue-editor id="editor" v-model="content"></vue-editor>
          </form>
          <div style="float:right;margin-top:17px;">
            <button class="btn btn-sm btn-outline-accent" @click="handleSavingContent">
              <i class="material-icons">save</i> Publish Now</button>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-12">
      <div class='card card-small mb-3'>
        <div class="card-header border-bottom">
          <h6 class="m-0">Actions</h6>
        </div>
        <div class='card-body p-0'>
          <ul class="list-group list-group-flush">
            <li class="list-group-item p-3">
              <span class="d-flex mb-2">
                <i class="material-icons mr-1">flag</i>
                <strong class="mr-1">Status:</strong> Publish
                <a class="ml-auto" href="#">Edit</a>
              </span>
              <span class="d-flex mb-2">
                <i class="material-icons mr-1">visibility</i>
                <strong class="mr-1">Visibility:</strong>
                <strong class="text-success">Public</strong>
              </span>
              <span class="d-flex mb-2">
                <i class="material-icons mr-1">calendar_today</i>
                <strong class="mr-1">Schedule:</strong> Now
              </span>
              <span class="d-flex">
                <i class="material-icons mr-1">score</i>
                <strong class="mr-1">Readability:</strong>
                <strong class="text-warning">Ok</strong>
              </span>
            </li>
          </ul>
        </div>
      </div>
      <div class='card card-small mb-3'>
        <div class="card-header border-bottom">
          <h6 class="m-0">Categories</h6>
        </div>
        <div class='card-body p-0'>
          <ul class="list-group list-group-flush">
            <li class="list-group-item px-3 pb-2">
              <div class="categories_list">
                <div class="custom-control custom-checkbox mb-1" v-for="items in Categories">
                  <input type="checkbox" class="custom-control-input" :value="items.name" :id="items.name" v-model="languages" :checked="items.checked">
                  <label class="custom-control-label" :for="items.name">{{ items.name }}</label>
                </div>
              </div>
            </li>
            <li class="list-group-item d-flex px-3">
              <div class="input-group">
                <input type="text" class="form-control" v-model="input" id="label-Categories" placeholder="New category" aria-label="Add new category" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-white px-2" @click="HandleAddCategories" id="add_Categories" type="button">
                    <i class="material-icons">add</i>
                  </button>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import { VueEditor } from 'vue2-editor';
  export default {
    props:['route','csrf'],
    components: {
      VueEditor
    },
    data() {
      return {
        content: '',
        title:'',
        Categories:[
          {name:'Design',checked:true},
          {name:'Development',checked:false},
          {name:'Books',checked:true}
        ],
        languages:[],
        input:'',
        summary:''
      }
    },
    methods:{
      handleSavingContent:function () {
        axios.post(this.route, {
          title:this.title,
          content:this.content,
          _token:this.scrf,
          categories:this.languages.length>0 ? this.languages.join(',').toString() : 'Uncategorized',
          summary:this.summary
        }).then((response)=>{
          this.$swal("Good job!",response.data.success, "success").then(()=>{
            window.location.reload();
          });
        }).catch((error)=>{
          this.$swal("Oops" ,"Something went wrong!",  "error" );
        });
      },
      HandleAddCategories:function () {
        this.Categories.push({
          name:this.input,
          checked:true
        });
        this.input = ''; // clear input
      }
    }
  };
</script>

<style scoped>
  #editor{
    height:100vh;
  }
</style>
