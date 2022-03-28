import home from '../components/backend/home.vue'

//Category
import category from '../components/backend/category/manage'
import categorycreate from '../components/backend/category/create'
import editCategory from '../components/backend/category/edit'

//post
import post from '../components/backend/post/manage'
import postcreate from '../components/backend/post/create'
import editpost from '../components/backend/post/edit'


export const routes = [
    { path: '/home', component: home },

    //Category
    { path: '/categories', component: category },
    { path: '/addcategory', component: categorycreate },
    { path: '/editcategory/:id', component: editCategory },

    //Post
    { path: '/posts', component: post },
    { path: '/addpost', component: postcreate },
    { path: '/editpost/:id', component: editpost }
];