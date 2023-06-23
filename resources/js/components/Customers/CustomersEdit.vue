<template>
    <div class="">
        <form @submit.prevent="saveCustomer()"
            class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded md:col-span-2 uppercase">
            <div class="px-4 py-6 sm:p-8">
                <h2 class="my-8 text-3xl font-extrabold dark:text-white">Cliente</h2>
                <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <div class="sm:col-span-6">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">NOMBRE</label>
                        <div class="mt-2">
                            <input @input="(val) => (customer.name = customer.name.toUpperCase())" required v-model="customer.name"
                                type="text" name="first-name" id="first-name" autocomplete="given-name"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">RFC</label>
                        <div class="mt-2">
                            <input @input="(val) => (customer.rfc = customer.rfc.toUpperCase())" required v-model="customer.rfc"
                                type="text" name="first-name" id="first-name" autocomplete="given-name"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="street-address" class="block text font-medium leading-6 text-gray-900">DIRECCIÓN</label>
                        <div class="mt-2">
                            <input @input="(val) => (customer.address = customer.address.toUpperCase())" required
                                v-model="customer.address" type="text" name="street-address" id="street-address"
                                autocomplete="street-address"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-3 sm:col-start-1">
                        <label for="city" class="block text font-medium leading-6 text-gray-900">NO. EXTERIOR</label>
                        <div class="mt-2">
                            <input @input="(val) => (customer.exterior_number = customer.exterior_number)" required
                                v-model="customer.exterior_number" type="number" name="city" id="city"
                                autocomplete="address-level2"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="region" class="block text font-medium leading-6 text-gray-900">NO. INTERIOR</label>
                        <div class="mt-2">
                            <input required v-model.number="customer.interior_number" type="number" name="region" id="region"
                                autocomplete="address-level1"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-3 sm:col-start-1">
                        <label for="street-address" class="block text font-medium leading-6 text-gray-900">COLONIA</label>
                        <div class="mt-2">
                            <input @input="(val) => (customer.address = customer.area.toUpperCase())" required v-model="customer.area"
                                type="text" name="street-address" id="street-address" autocomplete="street-address"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="postal-code" class="block text font-medium leading-6 text-gray-900">CODIGO
                            POSTAL</label>
                        <div class="mt-2">
                            <input @input="(val) => (customer.postal_code = customer.postal_code.toUpperCase())"
                                v-model="customer.postal_code" type="text" name="postal-code" id="postal-code"
                                autocomplete="postal-code"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>



                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="country" class="block text font-medium leading-6 text-gray-900">PAÍS </label>
                        <div class="mt-2">
                            <select required id="country" name="country" autocomplete="country-name" v-model="customer.country"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text sm:leading-6">
                                <option>USA</option>
                                <option>CANADA</option>
                                <option>MEX</option>
                            </select>
                        </div>
                    </div>

                    <div class="sm:col-span-2 ">
                        <label for="city" class="block text font-medium leading-6 text-gray-900">CIUDAD</label>
                        <div class="mt-2">
                            <input @input="(val) => (customer.city = customer.city.toUpperCase())" required v-model="customer.city"
                                type="text" name="city" id="city" autocomplete="address-level2"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="region" class="block text font-medium leading-6 text-gray-900">ESTADO</label>
                        <div class="mt-2">
                            <Combobox required as="div" v-model="customer.state">

                                <div class="relative mt-2">
                                    <ComboboxInput required
                                        class="w-full rounded border-0 bg-white py-1.5 pl-3 pr-10 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6"
                                        @change="query = $event.target.value" :display-value="(person) => person" />
                                    <ComboboxButton required
                                        class="absolute inset-y-0 right-0 flex items-center rounded-r-md px-2 focus:outline-none">
                                        <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                    </ComboboxButton>

                                    <ComboboxOptions v-if="filteredPeople.length > 0"
                                        class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text">
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

                    <div class="sm:col-span-6">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">CUENTA DE
                            BANCO</label>
                        <div class="mt-2">
                            <input @input="(val) => (customer.bank_account = customer.bank_account.toUpperCase())" required
                                v-model="customer.bank_account" type="text" name="first-name" id="first-name"
                                autocomplete="given-name"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="currency" class="block text font-medium leading-6 text-gray-900">MONEDA</label>
                        <div class="mt-2">
                            <select required id="currency" name="currency" autocomplete="currency" v-model="customer.currency"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text sm:leading-6">
                                <option>PESOS</option>
                                <option>DOLARES</option>
                            </select>
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">REGIMEN
                            FISCAL</label>
                        <div class="mt-2">
                            <input @input="(val) => (customer.tax_regime = customer.tax_regime.toUpperCase())" required
                                v-model="customer.tax_regime" type="text" name="first-name" id="first-name"
                                autocomplete="given-name"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2 sm:col-start-1 pt-9">
                    <SwitchGroup as="div" class="flex items-center">
                        <Switch v-model="customer.withholding"
                            :class="[customer.withholding ? 'bg-indigo-600' : 'bg-gray-200', 'relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2']">
                            <span aria-hidden="true"
                                :class="[customer.withholding ? 'translate-x-5' : 'translate-x-0', 'pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out']" />
                        </Switch>
                        <SwitchLabel as="span" class="ml-3 text-sm">
                            <span class="font-medium text-gray-900">RETENCION DEL 4%</span>
                            {{ ' ' }}
                            
                        </SwitchLabel>
                    </SwitchGroup>
                    </div>

                    <div class="sm:col-span-2 ">
                        <label for="currency" class="block text font-medium leading-6 text-gray-900">TIPO DE PAGO</label>
                        <div class="mt-2">
                            <select required id="currency" name="currency" autocomplete="currency"
                                v-model="customer.payment_type"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text sm:leading-6">
                                <option>TRANSFERENCIA</option>
                                <option>EFECTIVO</option>
                            </select>
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="street-address" class="block text font-medium leading-6 text-gray-900">TASA I.V.A</label>
                        <div class="mt-2">
                            <input @input="(val) => (customer.iva_rate = customer.iva_rate.toUpperCase())" required
                                v-model="customer.iva_rate" type="text" name="street-address" id="street-address"
                                autocomplete="street-address"
                                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="street-address" class="block text font-medium leading-6 text-gray-900">CUENTA CONTABLE</label>
                        <div class="mt-2">
                            <input @input="(val) => (customer.ledger_account = customer.ledger_account.toUpperCase())" required
                                v-model="customer.ledger_account" type="text" name="street-address" id="street-address"
                                autocomplete="street-address"
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
import useCustomers from '../../composables/customers.js';
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

const { errors, updateCustomer, customer, getCustomer } = useCustomers();

const saveCustomer = async () => {
    updateCustomer(props.id)
}

const props = defineProps({
  id: String
});

onMounted(getCustomer(props.id))

</script>