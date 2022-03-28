import axios from "axios";

export default{
    state: {
        categoryData: [],
        postData: []


      },
      getters: {
        categories (state) {
          return state.categoryData;
        },
            posts (state) {
              return state.postsData;
            }
      },
      actions:{
        categories(data){
            axios.get("getcategory").then( (response) =>{
                    //    console.log(response.data.category);
                    data.commit("categories", response.data.category );
            }).catch((error) =>{

            })
        },
        posts(data){
            axios.get("getposts").then( (response) =>{
                    //    console.log(response.data.category);
                    data.commit("posts", response.data.posts );
            }).catch((error) =>{

            })
        }

      },
      mutations: {
        categories(state, data){
            return state.categoryData = data;
        },

        posts(state, data){
            return state.postsData = data;
        }
      }
}
