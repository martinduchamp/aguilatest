<template>
    <div>
        <form @submit.prevent="saveOwner()" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded md:col-span-2">
            <div class="px-4 py-6 sm:p-8">
                <h1 class="my-8 text-5xl font-extrabold dark:text-white">Insertar un nuevo Propietario</h1>
                <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <div class="col-span-full">
                        <label for="owner-name" class="block text-sm font-medium leading-6 text-gray-900">NOMBRE DE
                            PROPIETARIO</label>
                        <div class="mt-2">
                            <input @input="(val) => (owner.name = owner.name.toUpperCase())"  v-model="owner.name" type="text" name="owner-name" id="owner-name"
                                autocomplete="owner-name"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="city" class="block text-sm font-medium leading-6 text-gray-900">TIPOS DE
                            REMOLQUES</label>
                        <div class="mt-2">
                            <ul
                                class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                                <li v-for="trailer in trailers" :key="trailer.id"
                            class="uppercase w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                            <div class="flex items-center pl-3">
                                <input :id="trailer.name" type="checkbox" :value="trailer.id" v-model="trailersattach"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label :for="trailer.name"
                                    class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    {{ trailer.name }}
                                </label>
                            </div>
                        </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                <button
                    class="bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    GUARDAR
                </button>
            </div>
        </form>
    </div>
</template>
<script>
import { reactive } from 'vue';
import { ref } from "vue";
import useOwners from '../../composables/owners';
import useTrailers from '../../composables/trailers'
import { onMounted } from 'vue';
import { isProxy, toRaw } from 'vue';

export default {
    props: {
        id: {
            required: true,
            type: String
        }
    },
    setup(props) {
        const { errors, storeOwner, getOwner, owner, updateOwner, trailersattach } = useOwners();
        const { getTrailers, trailers } = useTrailers();

        const form = reactive({
            'name': "owner",
            'owner': owner,
            'trailers': trailersattach
        })




        const saveOwner = async () => {
            await updateOwner(props.id, {...form})
        }

        onMounted(() => {
            getTrailers()
            getOwner(props.id)
           console.log(owner.value)
        });

        return {
            form,
            errors,
            saveOwner,
            trailers,
            trailersattach,
            owner
        }
    }
}
</script>