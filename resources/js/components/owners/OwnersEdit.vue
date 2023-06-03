<template>
    <div>
        <h1 class="my-8 text-5xl font-extrabold dark:text-white">Insertar un nuevo Propietario</h1>

        <form @submit.prevent="saveOwner()" class="w-full max-w-lg ">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Nombre de Propietario
                    </label>
                    <input v-model="owner.name"
                        class="uppercase appearance-none block w-full bg-gray-100 text-black border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="grid-first-name" type="text" placeholder="Nombre de Propietario" required>
                    <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
                </div>
                <div class="w-full px-3 mb-6 md:mb-0 my-8">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        SLECCIONA LOS TIPOS DE REMOLQUES
                    </label>
                    <ul
                        class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                        <li v-for="trailer in trailers" :key="trailer.id"
                            class="uppercase w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                            <div class="flex items-center pl-3">
                                <input id="vue-checkbox" type="checkbox" :value="trailer.id" v-model="trailersattach"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="vue-checkbox"
                                    class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    {{ trailer.name }}
                                </label>
                            </div>
                        </li>



                    </ul>
                </div>
            </div>

            <div class="flex items-center justify-between">
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
            'name': "test",
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