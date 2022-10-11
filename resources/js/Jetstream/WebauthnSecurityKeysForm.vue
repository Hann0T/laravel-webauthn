<script setup>
import { ref, onMounted } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';
import ActionSection from '@/Components/ActionSection.vue';
import DialogModal from '@/Components/DialogModal.vue';
import ConfirmationModal from '@/Components/ConfirmationModal.vue';
import InputError from '@/Components/InputError.vue';
import DangerButton from '@/Components/DangerButton.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import WebAuthn from '@/vendor/webauthn/webauthn.js';

const publicKeys = ref([]);
const errorMessage = ref('');
const webauthnSupported = ref(true);

const keyCreationModalIsOpen = ref(false);
const keyIsHandledModal = ref(false);

const keyBeingHandled = ref('');

const keyName = ref(null);

const form = useForm({
    name: '',
});

const webauthn = new WebAuthn((name, message) => {
    errorMessage.value = _errorMessage(name, message);
});

const _errorMessage = (name, message) => {
  switch (name) {
  case 'InvalidStateError':
    return 'This key is already registered. It’s not necessary to register it again.';
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

// Modal Functions
const openKeyCredentialModal = () => {
    keyCreationModalIsOpen.value = true;

    setTimeout(() => keyName.value.focus(), 250);
};

const closeKeyCredentialModal = () => {
    keyCreationModalIsOpen.value = false;

    form.reset();
    errorMessage.value = '';
};

const openKeyHandledModal = (key) => {
    keyIsHandledModal.value = true;
    keyBeingHandled.value = key.id;
    form.name = key.name; 
};

const closeKeyHandledModal = () => {
    keyIsHandledModal.value = false;

    form.reset();
    keyBeingHandled.value = '';
}
// Modal Functions End

onMounted(() => {
    getPublicKeys();

    if (!webauthn.webAuthnSupport()) {
       isSupported.value = false;
       errorMessage.value = notSupportedMessage();
    }
});

const getPublicKeys = async () => {
    const response = await fetch('/webauthn/keys');
    const data = await response.json();
    publicKeys.value = data;
} 

const createKey = async () => {
    const response = await axios.post('/webauthn/keys/options');
    const publicKey = response.data.publicKey;

    webauthn.register(
        publicKey,
        function (data) {
          axios.post('/webauthn/keys', {
            ...data,
            name: form.name,
          })
          .then(function (response) {
              if (response.data?.callback) {
                  window.location.href = response.data.callback;
              }
              getPublicKeys();
              closeKeyCredentialModal();
          })
          .catch(function (error) {
              console.log(error);
          });
        }
    );
}

const deleteKey = async () => {
    const response = await axios.delete(`/webauthn/keys/${keyBeingHandled.value}`);
    getPublicKeys();
    closeKeyHandledModal();
}

const updateKey = async () => {
    const response = await axios.put(`/webauthn/keys/${keyBeingHandled.value}`, {
        name: form.name,
    });

    getPublicKeys();
    closeKeyHandledModal();
}

</script>

<template>
    <ActionSection>
        <template #title>
            Webauthn Keys
        </template>

        <template #description>
            Manage your webauthn keys.
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                Webauthn is a new way to authenticate users without a password.
                Once you register a new key, next time you want to login you must use the key for authenticate.
            </div>

            <div v-if="publicKeys.length > 0" class="mt-5 space-y-6">
                <div v-for="(key, i) in publicKeys" :key="i" class="flex items-center">
                   <div class="flex gap-4 items-center">
                        <span class="text-sm text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-8 h-8 text-gray-500">
                                <path fill="#6b7280" d="M336 352c97.2 0 176-78.8 176-176S433.2 0 336 0S160 78.8 160 176c0 18.7 2.9 36.8 8.3 53.7L7 391c-4.5 4.5-7 10.6-7 17v80c0 13.3 10.7 24 24 24h80c13.3 0 24-10.7 24-24V448h40c13.3 0 24-10.7 24-24V384h40c6.4 0 12.5-2.5 17-7l33.3-33.3c16.9 5.4 35 8.3 53.7 8.3zm40-176c-22.1 0-40-17.9-40-40s17.9-40 40-40s40 17.9 40 40s-17.9 40-40 40z"/>
                            </svg>
                        </span>
                        <div class="flex flex-col gap-1">
                            <div class="flex gap-4 items-center">
                                <p class="text-gray-600">{{ key.name }}</p>                    
                                <button 
                                    @click="openKeyHandledModal(key)"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-4 w-4">
                                        <path fill="#6b7280" d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/>
                                    </svg>
                                </button>
                            </div>
                            <p class="text-gray-500 text-sm">{{ key.last_active }}</p>                    
                        </div>
                   </div> 
                </div>
            </div>

            <div class="flex items-center gap-4 mt-5">
                <PrimaryButton :disabled="!webauthnSupported" @click="openKeyCredentialModal">
                    Create a new key
                </PrimaryButton>
                <span class="text-sm text-gray-500" v-if="!webauthnSupported">
                    Your browser doesn't support Webauthn
                </span>
            </div>

            <!-- Key Creation Modal -->
            <DialogModal :show="keyCreationModalIsOpen" @close="closeKeyCredentialModal">
                <template #title>
                    Create a new Webauthn Key
                </template>

                <template #content>
                    <div class="mt-4">
                        <TextInput
                            ref="keyName"
                            v-model="form.name"
                            type="text"
                            class="mt-1 block w-3/4"
                            placeholder="Key-name"
                            @keyup.enter="createKey"
                        />

                        <InputError :message="errorMessage" class="mt-2" />
                    </div>
                </template>

                <template #footer>
                    <SecondaryButton @click="closeKeyCredentialModal">
                        Cancel
                    </SecondaryButton>
                    <PrimaryButton
                        class="ml-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="createKey"
                    >
                        Create
                    </PrimaryButton>
                </template>
            </DialogModal>

            <!-- Key handling Modal -->
            <DialogModal :show="keyIsHandledModal" @close="closeKeyHandledModal">
                <template #title>
                    Edit Key
                </template>

                <template #content>
                    <div class="mt-4">
                        <TextInput
                            ref="keyName"
                            v-model="form.name"
                            type="text"
                            class="mt-1 block w-3/4"
                            placeholder="Key-name"
                            @keyup.enter="updateKey"
                        />

                        <InputError :message="form.errors.name" class="mt-2" />
                    </div>
                </template>

                <template #footer>
                    <SecondaryButton @click="closeKeyHandledModal">
                        Cancel
                    </SecondaryButton>
                    <PrimaryButton
                        class="ml-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="updateKey"
                    >
                        Update 
                    </PrimaryButton>
                    <DangerButton
                        class="ml-3"
                        @click="deleteKey"
                    >
                        Delete
                    </DangerButton>
                </template>
            </DialogModal>
        </template>
    </ActionSection>
</template>
