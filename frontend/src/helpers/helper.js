
import { notify } from "@kyvg/vue3-notification";

export const notifyAlertErrorGeneral = (grupo) => {
  notify({
    group: grupo,
    duration: 5000,
    type: 'error',
    title: '&emsp; Sem conexão com o servidor :( &emsp;',
    text: 'Desculpe os transtornos!!!',
  });
};

export const notifyAlert = (titulo, texto, tipo = '') => {
  notify({
    type: tipo,
    title: titulo,
    text: texto,
  });
};

export const limpaCaracteres = (data) => {
  if (/[^a-zA-Z0-9]/.test(data)) {
    return data.replace(/[^\d]+/g,'');
  }

  return data;
}