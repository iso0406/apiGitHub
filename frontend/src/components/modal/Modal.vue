<template>
  <div>
    <div v-show="modal" class="modal">
      <div class="divButton">
        <div class="flex justify-between w-full mb-2">
          <div></div>
          <button type="button" class="close-btn" @click="closeModal">
            <i class="far fa-times-circle mr-2 text-3xl text-gray-200"></i>
          </button>
        </div>
      
        <div class="container">
          <div class="w-20 h-20 rounded-full">
            <img :src="additionalData.avatar_url" alt="Avatar" class="w-full h-full rounded-full" />
          </div>
            <p><span class="font-bold">Nome: </span> {{ additionalData.name ? additionalData.name : 'Não Informado !' }}</p>
            <p><span class="font-bold">Username: </span> {{ additionalData.login ? additionalData.login : 'Não Informado !' }}</p>
            <p><span class="font-bold">blog: </span> {{ additionalData.blog ? additionalData.blog : 'Não Informado !' }}</p>
            <p><span class="font-bold">Empresa: </span> {{ additionalData.company ? additionalData.company : 'Não Informado !' }}</p>
            <p><span class="font-bold">Localização: </span> {{ additionalData.location ? additionalData.location : 'Não Informado !' }}</p>
            <p><span class="font-bold">Seguidores: </span> {{ additionalData.followers ? additionalData.followers : 'Não Informado !' }}</p>
            <p><span class="font-bold">Seguindo: </span> {{ additionalData.following ? additionalData.following : 'Não Informado !' }}</p>
            <p><span class="font-bold">Link Repositório: </span> 
              <a :href="additionalData.html_url ? additionalData.html_url : '#'" target="_blank" rel="noopener noreferrer" class="underline">
                  {{ additionalData.html_url ? additionalData.html_url : 'Não Informado' }}
                </a>
            </p>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "Modal",
  emits: ['closeModal'],
  props: {
    modal: {
      type: Boolean,
      default: false,
    },
    additionalData: null,
  },
  methods: {
      closeModal() {
        this.$emit("close-modal");
      },
  },
};
</script>
<style scoped>
.modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.7);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 99;
}

.divButton {
  width: 50%;
  height: 50%;
}

.container {
  background-color: aliceblue;
  width: 100%;
  height: auto;
  border-color: 4px solid black;
  border-radius: 17px;
  padding: 10px;
}
</style>
