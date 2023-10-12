import { createRouter, createWebHistory } from "vue-router";
import ViewTetoSalarial from "../views/apigit/ViewApiGit.vue";

const router = createRouter({
  history: createWebHistory(process.env.VUE_APP_BASE_URL),
  routes: [
    {
      path: "/apiGit",
      name: "apiGit",
      component: ViewTetoSalarial,
    },
  ],
});

export default router;
