<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DangerButton from '@/Components/DangerButton.vue';
import { Head,Link,useForm } from '@inertiajs/vue3';
import Swal from 'sweetalert2';

const props = defineProps({
    dependencies:{type: Object}
});

const form = useForm({
    id:''
});

console.log(props);
const deleteDepartment = (id,name) =>{
    const alerta = Swal.mixin({
        buttonsStyling:true
    });
    alerta.fire({
        title:'Are you sure delete '+name+' ?',
        icon:'question', showCancelButton:true,
        confirmButtonText:'<i class="fa-solid fa-check"></i> Yes,delete',
        cancelButtonText:'<i class="fa-solid fa-ban"></i> Cancel'
    }).then((result) => {
        if(result.isConfirmed) {
            form.delete(route('dependencies.destroy',id));
        }
    });
}

</script>

<template>
    <Head title="dependencies" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Dependencias</h2>
        </template>

        <div class="py-12">
            <div class="grid bg-white v-screen place-items-center">
                <div class="flex mt-3 mb-3">
                    <Link :href="route('dependencies.create')"
                    :class="'px-4 py-2 bg-gray-800 text-white border rounded-md font-semibold text-xs'">
                    <i class="fa-solid fa-plus-circle"></i> Crear
                    </Link>
                </div>
            </div>
            <div class="grid bg-white v-screen place-items-center py-8">
                <table class="border border-gray-400 table-auto">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-4">#</th>
                            <th class="px-4 py-4">Dependencias</th>
                            <th class="px-4 py-4"></th>
                            <th class="px-4 py-4"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="dep, i in dependencies" :key="dep.id">
                        <td class="px-4 py-4 border border-gray-400">{{ (i+1) }}</td>
                        <td class="px-4 py-4 border border-gray-400">{{ dep.name }}</td>
                        <td class="px-4 py-4 border border-gray-400">
                            <Link :href="route('dependencies.edit',dep.id)"
                            :class="'px-4 py-2 bg-yellow-400 text-white border rounded-md font-semibold text-xs'">
                            <i class="fa-solid fa-edit"></i>
                            </Link>
                        </td>
                        <td class="px-4 py-4 border border-gray-400">                      
                            <DangerButton @click="deleteDepartment(dep.id,dep.name)">
                                <i class="fa-solid fa-trash"></i>
                            </DangerButton>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
