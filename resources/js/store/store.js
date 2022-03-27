import axios from "axios";

export default{
    state: {
        categoryData: []


      },
      getters: {
        categories (state) {
          return state.categoryData;
        }
      },
      actions:{
        categories(data){
            axios.get("getcategory").then( (response) =>{
                    //    console.log(response.data.category);
                    data.commit("categories", response.data.category );
            }).catch((error) =>{

            })
        }

      },
      mutations: {
        categories(state, data){
            return state.categoryData = data;
        }
      }
}
