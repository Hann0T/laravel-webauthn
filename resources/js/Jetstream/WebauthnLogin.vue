<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import { ref, onMounted } from 'vue';
import WebAuthn from '@/vendor/webauthn/webauthn.js';
import PrimaryButton from '@/Components/PrimaryButton.vue'; 

const props = defineProps({
    publicKey: Object,
});

const isBeingAuthenticated = ref(false);
const isSupported = ref(true);
const errorMessage = ref('');
const errorAuth = ref('');

onMounted(() => {
    errorMessage.value = '';

    if (!webauthn.webAuthnSupport()) {
        isSupported.value = false;
        errorMessage.value = notSupportedMessage();
        return;
    }

    Authenticate();
});

const webauthn = new WebAuthn((name, message) => {
    errorMessage.value = _errorMessage(name, message);
    isBeingAuthenticated.value = false;
});

const _errorMessage = (name, message) => {
    switch (name) {
        case 'InvalidStateError':
            return 'Error inesperado al iniciar sesión.';
        case 'NotAllowedError':
            return 'Se agotó el tiempo de espera de la operación o no se permitió.';
        default:
            return message;
    }
};

const notSupportedMessage = () => {
    switch (webauthn.notSupportedMessage()) {
        case 'not_supported':
            return 'Tu navegador no soporta WebAuthn.';
        case 'not_secured':
            return 'WebAuthn solo soporta conexiones seguras. Por favor carga esta pagina con el esquema https.';
        default:
            return '';
    }
};

const Authenticate = () => {
    isBeingAuthenticated.value = true;
    webauthn.sign(
        props.publicKey,
        function(data) {
            axios
            .post('/webauthn/auth', { 
                ...data, 
                response: {
                    ...data.response,
                    clientDataJSON: data.response.clientDataJSON.replace('==',''), // workaround for safari
                }
            })
            .then((response) => {
                isBeingAuthenticated.value = false;
                if (response.data?.callback) {
                    window.location.href = response.data.callback;
                }
            })
            .catch((error) => {
                isBeingAuthenticated.value = false;
                errorAuth.value = error?.response?.data;
                console.error(error?.response?.data);
            });
        }
    );
}
</script>

<template>
    <section>
       <div v-if="!isSupported">
            {{ notSupportedMessage() }}
       </div> 
       <div v-else class="flex flex-col gap-4">
            <div class="flex flex-col justify-center items-center gap-4">
                <h2 class="text-6xl text-center text-gray-700">
                    <i class="fa-solid fa-fingerprint"></i>
                </h2>
                <span class="text-gray-700">WebAuthn</span>
            </div>

            <PrimaryButton @click="Authenticate" :disabled="isBeingAuthenticated">
                <span
                    v-if="errorAuth || errorMessage"
                    class="text-center inline-block w-full"
                >
                    Volver a Intentar
                </span>
                <span v-else class="text-center inline-block w-full">
                    Iniciar Sesión
                </span>
            </PrimaryButton>

            <p class="text-red-500" v-if="errorMessage">{{ errorMessage }}</p>
       </div>
    </section>
</template>
