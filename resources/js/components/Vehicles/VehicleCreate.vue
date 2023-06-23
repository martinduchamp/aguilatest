<template>
    <div class="">
        <form @submit.prevent="saveVehicle()"
            class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded md:col-span-2 uppercase">
            <div class="px-4 py-6 sm:p-8">
                <h2 class="my-8 text-3xl font-extrabold dark:text-white">Nuevo Vehiculo</h2>
                <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <div class="sm:col-span-6">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">NUMERO DE VEHICULO</label>
                        <div class="mt-2">
                            <input @input="(val) => (form.vehicle_number = form.vehicle_number.toUpperCase())" required v-model="form.vehicle_number"
                                type="text" name="first-name" id="vehicle-number" autocomplete="given-name"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="country" class="block text font-medium leading-6 text-gray-900">TIPO </label>
                        <div class="mt-2">
                            <select required id="country" name="country" autocomplete="country-name" v-model="form.type"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text sm:leading-6">
                                <option>CARRETERA</option>
                            </select>
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">PLACAS</label>
                        <div class="mt-2">
                            <input @input="(val) => (form.plates = form.plates.toUpperCase())" required v-model="form.plates"
                                type="text" name="first-name" id="plates" autocomplete="given-name"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">MARCA</label>
                        <div class="mt-2">
                            <input @input="(val) => (form.brand = form.brand.toUpperCase())" required v-model="form.brand"
                                type="text" name="first-name" id="brand" autocomplete="given-name"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">VIN</label>
                        <div class="mt-2">
                            <input @input="(val) => (form.vin = form.vin.toUpperCase())" required v-model="form.vin"
                                type="text" name="first-name" id="vin" autocomplete="given-name"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">MODELO</label>
                        <div class="mt-2">
                            <input @input="(val) => (form.model = form.model.toUpperCase())" required v-model="form.model"
                                type="text" name="first-name" id="model" autocomplete="given-name"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">RENDIMIENTO</label>
                        <div class="mt-2">
                            <input @input="(val) => (form.performance = form.performance.toUpperCase())" required v-model="form.performance"
                                type="number" name="first-name" id="performance" autocomplete="given-name"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">COLOR</label>
                        <div class="mt-2">
                            <input @input="(val) => (form.color = form.color.toUpperCase())" required v-model="form.color"
                                type="text" name="first-name" id="color" autocomplete="given-name"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2 sm:col-start-1 pt-9">
                    <SwitchGroup as="div" class="flex items-center">
                        <Switch v-model="form.workshop"
                            :class="[form.workshop ? 'bg-indigo-600' : 'bg-gray-200', 'relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2']">
                            <span aria-hidden="true"
                                :class="[form.workshop ? 'translate-x-5' : 'translate-x-0', 'pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out']" />
                        </Switch>
                        <SwitchLabel as="span" class="ml-3 text-sm">
                            <span class="font-medium text-gray-900">TALLER</span>
                            {{ ' ' }}
                            
                        </SwitchLabel>
                    </SwitchGroup>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">EXCELCO</label>
                        <div class="mt-2">
                            <input @input="(val) => (form.excelco = form.excelco.toUpperCase())" required v-model="form.excelco"
                                type="text" name="first-name" id="excelco" autocomplete="given-name"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">EXCELCO</label>
                        <div class="mt-2">
                            <input @input="(val) => (form.energex = form.energex.toUpperCase())" required v-model="form.energex"
                                type="text" name="first-name" id="energex" autocomplete="given-name"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">GPS ID</label>
                        <div class="mt-2">
                            <input @input="(val) => (form.gps_id = form.gps_id.toUpperCase())" required v-model="form.gps_id"
                                type="text" name="first-name" id="gps-id" autocomplete="given-name"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">POLIZA</label>
                        <div class="mt-2">
                            <input @input="(val) => (form.policy = form.policy.toUpperCase())" required v-model="form.policy"
                                type="text" name="first-name" id="policy" autocomplete="given-name"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                </div>
            </div>
            <div class="flex items-center justify gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                <button type="button" class="text font-semibold leading-6 text-gray-900">CANCELAR</button>
                <button type="submit"
                    class="rounded bg-indigo-600 px-3 py-2 text font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">GUARDAR</button>
            </div>
        </form>
    </div>
</template>
<script setup>
import { Switch, SwitchGroup, SwitchLabel } from '@headlessui/vue'
import { reactive } from 'vue';
import useVehicles from '../../composables/vehicles.js';
import { onMounted } from 'vue';

import { computed, ref } from 'vue'
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/20/solid'
import {
    Combobox,
    ComboboxButton,
    ComboboxInput,
    ComboboxOption,
    ComboboxOptions,
} from '@headlessui/vue'



const query = ref('')
const filteredPeople = computed(() =>
    query.value === ''
        ? people
        : people.filter((person) => {
            return person.toLowerCase().includes(query.value.toLowerCase())
        })
)

const { errors, storeVehicle } = useVehicles();
const { operators, getOperators, destroyOperator } = useOperators();

const form = reactive({
    'vehicle_number': '',
    'type': '',
    'plates': '',
    'brand': '',
    'vin': '',
    'model': '',
    'performance': '',
    'color': '',
    'workshop': false,
    'excelco': '',
    'energex': '',
    'gps_id': '',
    'policy': '',
})


const saveVehicle = async () => {
    await storeVehicle({ ...form });
}

onMounted(() => {
    getOperators()
})

</script>