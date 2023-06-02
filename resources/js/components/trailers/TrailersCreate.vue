<template>
    <div>
        <h1 class="my-8 text-5xl font-extrabold dark:text-white">Insertar un nuevo tipo de remolque</h1>

        <form @submit.prevent="saveTrailer()" class="w-full max-w-lg ">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Nombre de Remolque
                    </label>
                    <input v-model="form.name"
                        class="uppercase appearance-none block w-full bg-gray-100 text-black border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="grid-first-name" type="text" placeholder="Nombre de remolque">
                    <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
                </div>
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</template>
<script>
import { reactive } from 'vue';
import useTrailers from '../../composables/trailers';

export default {
    setup() {
        const { errors, storeTrailer } = useTrailers();

        const form = reactive({
            'name': ''
        })

        const saveTrailer = async () => {
            await storeTrailer({ ...form });
        }

        return {
            form,
            errors,
            saveTrailer
        }
    }
}
</script>