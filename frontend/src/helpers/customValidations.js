export const file_size_validation = (value, vm) =>  {
    if (!value) {
        return true;
    }
    
    let file = value;  return (file.size < 12582912);
}

export const file_ext_validation = (value, vm) =>  {
    if (!value) {
        return true;
    }
    const ext = /^.+\.([^.]+)$/.exec(value.name);
    const filePermission = ['pdf','png','jpeg'];
    
    return filePermission.includes(ext[1]);
}

export const file_pesca = (value, vm) => {
    console.log(value,vm);
}

export const cpfCnpjValidate = (value, vm) => {
    if(value){
        // Remove caracteres que não são números
        const cpf = value.replace(/[^\d]/g, '');

        if(cpf.length == 11){
            // Verifica se todos os dígitos são iguais
            if (/^(\d)\1+$/.test(cpf)) {
                return false;
            }       
        }
    }

    return true;
}

export const cpfValidate = (value, vm) => {
    if(value){
        // Remove caracteres que não são números
        const cpf = value.replace(/[^\d]/g, '');

        if(cpf.length < 11){
            return false;
        }
    }

    return true;
}

export const cnpjValidate = (value, vm) => {
    if(value){
        // Remove caracteres que não são números
        const cnpj = value.replace(/[^\d]/g, '');
        if(cnpj.length > 11 && cnpj.length < 14){
            return false;
        }
    }

    return true;
}

export const emailValidate = (value,vm) => {
    if(value) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(value);
    }

    return true;
}