import home from '../components/backend/home.vue'
import category from '../components/backend/category/manage'
import categorycreate from '../components/backend/category/create'
import editCategory from '../components/backend/category/edit'

export const routes = [
      { path: '/home', component: home },
      { path: '/categories', component: category },
      { path: '/addcategory', component: categorycreate },
      { path: '/editcategory/:id', component: editCategory}
  ];
