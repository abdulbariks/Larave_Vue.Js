  <template>
    <div>
            <div class="content">
                <div class="content-fluid">
                    <div class="row">
                        <div class="col-md-8 offset-md-3">
                            <div class="card">
                                <div class="card-header">
                                      <div class="card-body">
                                            <h4 class="card-title my-1">Categories</h4>
                                            <div class="card-tools float-right">
                                                <router-link to="/addcategory" class="btn btn-info btn-sm ">Add Category</router-link>
                                            </div>
                                      </div>
                                      <div class="card-body p-0">
                                            <table class="table table-dark">
                                            <thead>
                                                <tr>
                                                <th scope="col">Serial No</th>
                                                <th scope="col">
                                                    <input type="checkbox">
                                                </th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Slug</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Created at</th>
                                                <th scope="col">Updete</th>
                                                <th scope="col">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(category, index) in categories" v-bind:key="(category, index) ">
                                                <th scope="row">{{++index}}</th>
                                                <th>
                                                    <input type="checkbox" :value="category.id" v-model="categoryids">
                                                </th>
                                                <td>{{category.name | subString(3)}}</td>
                                                <td>{{ category.slug}}</td>
                                                <td><span class="badge" :class="statusColor(category.status)">{{ statusName(category.status)}}</span></td>
                                                <td>{{ category.created_at | time}}</td>
                                                <td>
                                                    <router-link :to="`/editcategory/${category.id}`" class="btn btn-success btn-sm" >Edit</router-link>
                                                    <!-- <button type="button" class="btn btn-success btn-sm">Edit</button> -->
                                                </td>

                                                <td>
                                                     <!-- <a v-on:click="remove(category.id)" href="#" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure to Delete?')">Delete</a> -->
                                                     <button type="button" class="btn btn-danger btn-sm" v-on:click="myFunction(category.id)">Delete</button>
                                                </td>
                                                </tr>
                                                <tr v-if="emptyData()">
                                                    <td colspan="8">
                                                       <h3 class="text-center text-danger">Category Not Found</h3>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            </table>
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
    name: "manage",
    data: function(){
        return {
            categoryids: []
        }
    },

    computed:{
        categories(){
            return this.$store.getters.categories;
        }
    },

         mounted() {
        let this_ = this;
        this_.$store.dispatch("categories");
    },

    methods:{
        statusName: (status) =>{
            let data = {
                0: "Inactive", 1: "Active"}
            return data[status];
        },
        statusColor: (status) =>{
            let data = {
                0: "bg-danger", 1: "bg-success"}
            return data[status];
        },
       myFunction: function($id){
                let this_ = this;
              if (confirm("Are You Sure to Delete?") == true) {
                           axios.delete("/removecategory/" + $id).then( () =>{
                           this_.$store.dispatch("categories");

                          }).catch((error) =>{
                                    })
                    } else {
                        this_.$store.dispatch("categories");
                    }
        },

        // remove: function($id){
        //         let this_ = this;
        //         axios.delete("/removecategory/" + $id).then( () =>{
        //          this_.$store.dispatch("categories");

        //         }).catch((error) =>{
        //     })

        // },
        emptyData(){
        // return false;
        return (this.categories.length < 1);
        }
    }
}
</script>

<style scoped>

</style>


