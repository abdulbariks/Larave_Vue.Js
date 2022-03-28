  <template>
    <div>
            <div class="content">
                <div class="content-fluid">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="card">
                                <div class="card-header">
                                      <div class="card-body">
                                            <h4 class="card-title my-1">Add Categories</h4>
                                            <div class="card-tools float-right">
                                                <router-link to="/categories" class="btn btn-info btn-sm ">Show Category</router-link>
                                            </div>
                                      </div>
                                      <div class="card-body p-0">
                                         <div class="table table-sm">
                                                 <form class="form-horizontal" @submit.prevent="Category" @keydown="form.onKeydown($event)">
                                                        <div class="form-group">
                                                            <label for="">Category Name</label>
                                                            <input v-model="form.name" type="text" class="form-control" id="name" name="name" placeholder="Enter Category Name">
                                                             <div v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
                                                        </div>
                                                        <div class="form-group">

                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label" for="status" >Status</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                            <input class="form-check-input" name="status" type="radio" id="active" value="1" v-model="form.status" >
                                                            <label class="form-check-label" for="active">Active</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="status"  id="inactive" value="0" v-model="form.status" >
                                                            <label class="form-check-label" for="inactive">Inactive</label>
                                                            </div>
                                                            <div v-if="form.errors.has('status')" v-html="form.errors.get('status')" />
                                                        </div>


                                                        <button type="submit" :disabled="form.busy" name="addcategory" class="btn btn-primary">Add Category</button>
                                                    </form>
                                         </div>
                                      </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>
</template>

<script>


export default {
      name: "create",
    data: () => {
      return {
      form: new Form({
      name    : null,
      status  : null
    })
    }
 },

  methods: {
    Category: function(){
         let this_ = this;
      this.form.post('/addcategory')
                        .then(function(response){
                        // Toast.fire({
                        // icon: 'success',
                        // title: 'Category Added successfully'
                        // })
                        toastr.info("Category Added Successfully");

                       this_.$router.push("/addcategory");
                       this_.form.name = null;
                       this_.form.status = null;

      })
    }
  }




}
</script>

<style scoped>

</style>


