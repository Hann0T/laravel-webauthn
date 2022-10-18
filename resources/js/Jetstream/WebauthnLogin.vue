<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import { ref, onMounted } from 'vue';
import WebAuthn from '@/vendor/webauthn/webauthn.js';
import PrimaryButton from '@/Components/PrimaryButton.vue'; 

const props = defineProps({
    publicKey: Object,
});

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
});

const _errorMessage = (name, message) => {
    switch (name) {
        case 'InvalidStateError':
            return 'Unexpected error on login.';
        case 'NotAllowedError':
            return 'The operation either timed out or was not allowed.';
        default:
            return message;
    }
};

const notSupportedMessage = () => {
    switch (webauthn.notSupportedMessage()) {
        case 'not_supported':
            return 'Your browser doesn’t currently support WebAuthn.';
        case 'not_secured':
            return 'WebAuthn only supports secure connections. Please load this page with https scheme.';
        default:
            return '';
    }
};

const Authenticate = () => {
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
                if (response.data?.callback) {
                    window.location.href = response.data.callback;
                }
            })
            .catch((error) => {
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
            <h2 class="text-lg text-center text-gray-700">
                Webauthn Login
            </h2>
            <p class="text-red-500" v-if="errorMessage">{{ errorMessage }}</p>

            <PrimaryButton v-if="errorAuth || errorMessage" @click="Authenticate">
                <span class="text-center inline-block w-full">Retry</span>
            </PrimaryButton>
       </div>
    </section>
</template>
