<script>
import ModalEnviar from "@/components/solicitarInscricao/ModalEnviar.vue";
import retornoSolicitacao from "@/components/solicitarInscricao/Confirmar.vue";
import Solicitar from "@/components/solicitarInscricao/Solicitar.vue";
import { notify } from "@kyvg/vue3-notification";
import { defineComponent } from "vue";
import router from "@/router";
import PreloaderComponente from "@/components/preloader/PreloaderComponent.vue";
import SolicitarService from "@/services/solicitar.service";

export default defineComponent({
  components: {
    ModalEnviar,
    Solicitar,
    PreloaderComponente,
    retornoSolicitacao,
  },

  data() {
    return {
      toggleModalEnviar: false,
      contribuinte: {
        tipoContribuinte: "",
        cpfCnpj: "",
        razaoSocial: "",
        email: "",
        emailConfirme: "",
      },
    };
  },

  methods: {
    handleModalEnviar() {
      this.toggleModalEnviar = !this.toggleModalEnviar;
    },

    handleModalProsseguir() {
      // this.solicitar.loading = true;
      const sendContribuinte = this.contribuinte;

      sendContribuinte.cpfCnpj = sendContribuinte.cpfCnpj.replace(/[^\d]/g, "");

      SolicitarService.addSolicitacao(sendContribuinte)
        .then((res) => {
          this.retornoSolicitacao = res.data.data.retornoSolicitacao;

          if (res.request.status === 200 || res.request.status === 201) {
            notify({
              title: "Sucesso !",
              text:
                "Solitação do Contribuinte enviada."
            });
          }
          router.push({
            name: "confirmar",
            params: { retornoSolicitacao: res.data.data.retornoSolicitacao },
          });
        })
        .catch((error) => {
          notify({
            type: "error",
            title: "Erro no envio da Solicitação!",
            text: "Por favor revise seus dados e tende mais tarde.",
          });
          // this.solicitar.loading = false;
        });
    },
  },
});
</script>
<template>
  <main>
    <ModalEnviar
      :toggleModalEnviar="toggleModalEnviar"
      :handleModalEnviar="handleModalEnviar"
      :handleModalProsseguir="handleModalProsseguir"
    />
    <Solicitar
      :handleModalEnviar="handleModalEnviar"
      :contribuinte="contribuinte"
    />
  </main>
</template>
