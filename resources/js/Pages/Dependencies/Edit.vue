<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head,useForm } from '@inertiajs/vue3';

const props = defineProps({dependencie:{type:Object}});

 
const form = useForm({
    name: props.dependencie.name,
});

console.log(props);
</script>

<template>
    <Head title="Edit dependencies" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Editar dependencia</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="p-4 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <form @submit.prevent="form.patch(route('dependencies.edi',dependencie))"
                    class="max-w-xl mt-6 space-y-6">
                    <InputLabel for="name" value="Nombre"></InputLabel>
                    <TextInput id="name" v-model="form.name" autofocus required
                    type="text"
                    class="block w-full mt-1"></TextInput>
                    <InputError :message="form.errors.name" class="mt-2"></InputError>
                    <PrimaryButton :disabled="form.processing">
                        <i class="fa-solid fa-save"></i> Save
                    </PrimaryButton>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>