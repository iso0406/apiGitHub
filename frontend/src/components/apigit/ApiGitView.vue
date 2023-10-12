<template>
  <PreloaderComponente :preloader="loading"/>
  <ModalBio 
    :modal="modalOpen"
    :additionalData="getUserModal"
    @close-modal="modalOpen = false"
  />
  <main>
    <div class="mt-12 mb-2">
      <h3 class="text-3xl font-medium leading-5 text-blue-900">
        API GITHUB
      </h3>
      <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
          <div class="border-t border-gray-300"></div>
        </div>
      </div>
    </div>
    <form class="w-full shadow-sm mb-4 pb-4">
      <div class="flex space-x-2 h-12">
        <label for="userSearch" class="block text-sm font-medium mt-3 text-gray-700">
          Buscar Usuario *
        </label>
        <input
          type="text"
          required
          v-model="userSearch"
          class="px-3 py-2 mt-2 w-1/4 focus:outline-none focus:ring-blue-500 focus:border-blue-500 border border-gray-300 rounded-md sm:text-lg"
        />               
        <button
          type="button"
          @click="searchUser"
          class="flex items-center px-6 shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
        >
          <i class="fas fa-search text-1xl mr-2"></i> Buscar
        </button>
      </div>
    </form>
    
    
    <div v-if="getUser">
      <div class="bg-gray-100 p-7 flex flex-row border border-blue-200 rounded-md">
        <div class="w-40 h-40 rounded-full border-4 border-orange-500">
          <img :src="getUser.data.avatar_url" alt="Avatar" class="w-full h-full rounded-full" />
        </div>
        <div class="ml-4">
          <h3 class="text-3xl font-medium leading-5 text-blue-900 mb-4 border-b py-4">
            Dados do Usuário
          </h3>
          <div class="grid grid-cols-2 gap-4 w-full">
            <div class="bg-blue-300 border-6 border-blue-700 rounded-md p-4 shadow-sm">
              <p><span class="font-bold">Nome: </span> {{ getUser.data.name ? getUser.data.name : 'Não Informado !' }}</p>
              <p><span class="font-bold">Username: </span> {{ getUser.data.login ? getUser.data.login : 'Não Informado !' }}</p>
              <p>
                <span class="font-bold">Bio: </span> 
                <a :href="getUser.data.html_url ? getUser.data.html_url : '#'" target="_blank" rel="noopener noreferrer" class="underline">
                  {{ getUser.data.login ? getUser.data.login : 'Não Informado !' }}
                </a>
              </p>
              <p>
                <span class="font-bold">Link Git: </span>
                <a :href="getUser.data.html_url ? getUser.data.html_url : '#'" target="_blank" rel="noopener noreferrer" class="underline">
                  {{ getUser.data.html_url ? getUser.data.html_url : 'Não Informado' }}
                </a>
              </p>
              <p>
                <span class="font-bold">Link Blog: </span>
                <a :href="getUser.data.blog ? getUser.data.blog : '#'" target="_blank" rel="noopener noreferrer" class="underline">
                  {{ getUser.data.blog ? getUser.data.blog : 'Não Informado' }}
                </a>
              </p>
            </div>
            <div class="bg-blue-300 border-6 border-blue-700 rounded-md p-4 ml-7 w-full shadow-sm">
              <p><span class="font-bold">Empresa: </span> {{ getUser.data.company ? getUser.data.company : 'Não Informado !' }}</p>
              <p><span class="font-bold">Localização: </span> {{ getUser.data.location ? getUser.data.location : 'Não Informado !' }}</p>
              <p><span class="font-bold">Repositórios Públicos: </span> {{ getUser.data.public_repos ? getUser.data.public_repos : 'Não Informado !' }}</p>
              <p><span class="font-bold">Seguidores: </span> {{ getUser.data.followers }}</p>
              <p><span class="font-bold">Seguindo: </span> {{ getUser.data.following }}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="flex space-x-4 mt-5 mb-5">
        <button
          type="button"
          @click="getFollowersUser(getUser.data.login)"
          class="flex items-center py-2 px-6 shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
        >
          <i class="fas fa-user-friends text-1xl mr-2"></i>Seguidores de: {{ getUser.data.login }}
        </button>
        <button
          type="button"
          @click="mostrarModal"
          class="flex items-center py-2 px-6 shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
        >
          <i class="fas fa-user text-1xl mr-2"></i>Visualizar Bio
        </button>
      </div>
      
      <table class="min-w-full border text-center text-sm font-light dark:border-neutral-500 shadow-md display hover mt-4" 
        id="datatable" 
        style="width: 100%"
      >
        <thead class="border-b font-medium dark:border-neutral-500">
          <tr>
            <th scope="col" class="border-r px-2 py-4 dark:border-neutral-500 w-1/3">
              <div class="flex items-center">
                <span class="mr-2">Login de Seguidores</span>
              </div>
            </th>
            <th scope="col" class="border-r px-2 py-4 dark:border-neutral-500 w-1/3">
              <div class="flex items-center">
                <span class="mr-2">Link do Repositorio</span>
              </div>
            </th>
          </tr>
        </thead>
        <tbody class="align-middle">
          <tr v-for="user in getFollowers.data" :key="user.id" class="border dark:border-neutral-500">
            <td class="p-4">{{ user.login }}</td>
            <td class="p-4">
              <a :href="user.html_url" target="_blank">{{ user.html_url }}</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div v-else>
      <p>Nenhum usuario pesquisado...</p>
    </div>
    <div class="hidden sm:block" aria-hidden="true">
      <div class="py-5">
        <div class="border-t border-gray-300"></div>
      </div>
    </div>
  </main>
</template>

<script>
import ApiGitService from "../../services/apiGitUser.service";
import PreloaderComponente from "../../components/preloader/PreloaderComponent.vue";
import ModalBio from "../modal/Modal.vue";
import "jquery/dist/jquery.min.js";
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";
import $ from "jquery";

export default {
  components: {
    PreloaderComponente,
    ModalBio,
  },
  data() {
    return {
      userSearch: "",
      getUser: null,
      getFollowers: [],
      items: [], 
      loading: false,
      showContent: {
              'dropdown-1': false
      },
      modalOpen: false,
      getUserModal: false,
      additionalData: false,
    };
  },
  methods: {
    async searchUser() {
        try {
          this.getFollowers = '';
          this.getUser = '';

          const user = this.userSearch;

          this.loading = true;
          const response = await ApiGitService.getUser(user);
          
          this.getUser = response;
          this.getUserModal = response.data;
  
          this.loading = false;

        } catch (error) {
          console.log(error);
        }
    },
    async getFollowersUser(user) {
      const responseFollow = await ApiGitService.getFollowers(user);
      this.getFollowers = responseFollow;

      setTimeout(() => {
            $("#datatable").DataTable({
              language: {
                url: "https://cdn.datatables.net/plug-ins/1.11.4/i18n/pt_br.json",
              },
              lengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "Todos"],
              ],
              pageLength: 5,
              responsive: true,
            });
      });
    },
    mostrarModal() {
      this.modalOpen = true;
    },
    fecharModal() {
      this.modalOpen = false;
    },
    reloadPage() {
      window.location.reload();
    },
  },
};

</script>

<style scoped>

</style>
