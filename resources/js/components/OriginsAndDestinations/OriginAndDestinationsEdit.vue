<template>
    <div class="grid grid-cols-1 gap-x-8 gap-y-8 pt-10 md:grid-cols-1">
        <div class="px-4 sm:px-0">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Orignes y Destinos</h2>
            <!-- <p class="mt-1 text leading-6 text-gray-600">Use a permanent address where you can receive mail.</p> -->
        </div>

        <form @submit.prevent="saveOriginAndDestination()" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2 uppercase">
            <div class="px-4 py-6 sm:p-8">
                <h2 class="my-8 text-3xl font-extrabold dark:text-white">Nuevo Origen y Destino</h2>
                <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-6">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">NOMBRE</label>
                        <div class="mt-2">
                            <input @input="(val) => (origin_and_destination.name = origin_and_destination.name.toUpperCase())" required v-model="origin_and_destination.name"
                                type="text" name="first-name" id="first-name" autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="street-address" class="block text font-medium leading-6 text-gray-900">DIRECCIÓN</label>
                        <div class="mt-2">
                            <input @input="(val) => (origin_and_destination.address = origin_and_destination.address.toUpperCase())" required
                                v-model="origin_and_destination.address" type="text" name="street-address" id="street-address"
                                autocomplete="street-address"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="street-address" class="block text font-medium leading-6 text-gray-900">CALLE</label>
                        <div class="mt-2">
                            <input @input="(val) => (origin_and_destination.street = origin_and_destination.street.toUpperCase())" required
                                v-model="origin_and_destination.street" type="text" name="street-address" id="street-address"
                                autocomplete="street-address"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="street-address" class="block text font-medium leading-6 text-gray-900">RFC</label>
                        <div class="mt-2">
                            <input @input="(val) => (origin_and_destination.rfc = origin_and_destination.rfc.toUpperCase())" required v-model="origin_and_destination.rfc"
                                type="text" name="street-address" id="street-address" autocomplete="street-address"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="city" class="block text font-medium leading-6 text-gray-900">NO. EXTERIOR</label>
                        <div class="mt-2">
                            <input @input="(val) => (origin_and_destination.exterior_number = origin_and_destination.exterior_number.toUpperCase())" required
                                v-model="origin_and_destination.exterior_number" type="number" name="city" id="city"
                                autocomplete="address-level2"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="region" class="block text font-medium leading-6 text-gray-900">NO. INTERIOR</label>
                        <div class="mt-2">
                            <input required v-model.number="origin_and_destination.interior_number" type="number" name="region" id="region"
                                autocomplete="address-level1"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="country" class="block text font-medium leading-6 text-gray-900">PAÍS </label>
                        <div class="mt-2">
                            <select required id="country" name="country" autocomplete="country-name" v-model="origin_and_destination.country"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text sm:leading-6">
                                <option>USA</option>
                                <option>CANADA</option>
                                <option>MEX</option>
                            </select>
                        </div>
                    </div>

                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="city" class="block text font-medium leading-6 text-gray-900">CIUDAD</label>
                        <div class="mt-2">
                            <input @input="(val) => (origin_and_destination.city = origin_and_destination.city.toUpperCase())" required v-model="origin_and_destination.city"
                                type="text" name="city" id="city" autocomplete="address-level2"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="region" class="block text font-medium leading-6 text-gray-900">ESTADO</label>
                        <div class="mt-2">
                            <Combobox required as="div" v-model="origin_and_destination.state">

                                <div class="relative mt-2">
                                    <ComboboxInput required
                                        class="w-full rounded-md border-0 bg-white py-1.5 pl-3 pr-10 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6"
                                        @change="query = $event.target.value" :display-value="(person) => person" />
                                    <ComboboxButton required
                                        class="absolute inset-y-0 right-0 flex items-center rounded-r-md px-2 focus:outline-none">
                                        <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                    </ComboboxButton>

                                    <ComboboxOptions v-if="filteredPeople.length > 0"
                                        class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text">
                                        <ComboboxOption v-for="person in filteredPeople" :key="person" :value="person"
                                            as="template" v-slot="{ active, selected }">
                                            <li
                                                :class="['relative cursor-default select-none py-2 pl-3 pr-9', active ? 'bg-indigo-600 text-white' : 'text-gray-900']">
                                                <span :class="['block truncate', selected && 'font-semibold']">
                                                    {{ person }}
                                                </span>

                                                <span v-if="selected"
                                                    :class="['absolute inset-y-0 right-0 flex items-center pr-4', active ? 'text-white' : 'text-indigo-600']">
                                                    <CheckIcon class="h-5 w-5" aria-hidden="true" />
                                                </span>
                                            </li>
                                        </ComboboxOption>
                                    </ComboboxOptions>
                                </div>
                            </Combobox>
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="postal-code" class="block text font-medium leading-6 text-gray-900">CODIGO
                            POSTAL</label>
                        <div class="mt-2">
                            <input @input="(val) => (origin_and_destination.postal_code = origin_and_destination.postal_code.toUpperCase())"
                                v-model="origin_and_destination.postal_code" type="text" name="postal-code" id="postal-code"
                                autocomplete="postal-code"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                <button type="button" class="text font-semibold leading-6 text-gray-900">CANCELAR</button>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">GUARDAR</button>
            </div>
        </form>
    </div>
</template>
<script setup>


import { reactive } from 'vue';
import useOriginsAndDestinations from '../../composables/originDestinations';
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

const props = defineProps({
  id: String
});

const people = [
    "AGUASCALIENTES",
    "BAJA CALIFORNIA",
    "BAJA CALIFORNIA SUR",
    "CHIHUAHUA",
    "CHIAPAS",
    "CAMPECHE",
    "CIUDAD DE MEXICO",
    "COAHUILA",
    "COLIMA",
    "DURANGO",
    "GUERRERO",
    "GUANAJUATO",
    "HIDALGO",
    "JALISCO",
    "MICHOACAN",
    "ESTADO DE MEXICO",
    "MORELOS",
    "NAYARIT",
    "NUEVO LEON",
    "OAXACA",
    "PUEBLA",
    "QUINTANA ROO",
    "QUERETARO",
    "SINALOA",
    "SAN LUIS POTOSI",
    "SONORA",
    "TABASCO",
    "TLAXCALA",
    "TAMAULIPAS",
    "VERACRUZ",
    "YUCATAN",
    "ZACATECAS"
]

const query = ref('')
const filteredPeople = computed(() =>
    query.value === ''
        ? people
        : people.filter((person) => {
            return person.toLowerCase().includes(query.value.toLowerCase())
        })
)

const { errors, updateOriginAndDestination, getOriginAndDestination, origin_and_destination } = useOriginsAndDestinations();

const form = reactive({
    'name': '',
    'address': '',
    'street': '',
    'rfc': '',
    'postal_code': '',
    'city': '',
    'exterior_number': '',
    'interior_number': '',
    'country': '',
    'state': ''
})


const saveOriginAndDestination = async () => {
    // await storeOriginAndDestination({...form});
    updateOriginAndDestination(props.id)
}

onMounted(
    getOriginAndDestination(props.id)
)

</script>