<template>
    <div class="">
        <form @submit.prevent="saveAgreement()" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded  uppercase">
            <div class="px-4 py-6 sm:p-8">
                <h2 class="my-8 text-3xl font-extrabold dark:text-white">Editar Convenio</h2>
                <div class="grid  grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">


                    <div class="col-span-full">

                        <label for="currency" class="block text font-medium leading-6 text-gray-900">CLIENTE</label>
                        <div class="mt-2">
                            <select  id="currency" name="currency" autocomplete="currency" v-model="customer"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option :selected="customer.id === Agreement.customer_id" v-for="customer in customers" :key="customer" :value="customer">{{ customer.name }}</option>
                            </select>
                        </div>

                    </div>

                    <div class="sm:col-span-3   p-4 border bg-gray-50">

                        <label for="currency" class="block text font-medium leading-6 text-gray-900">REMITENTE</label>
                        <div class="mt-2">
                            <select  id="origin" name="currency" autocomplete="currency" v-model="sender"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option v-for="sender in origins_and_destinations" :value="sender">{{ sender.name }}
                                </option>
                            </select>
                        </div>

                        <label for="currency" class="block text font-medium leading-6 text-gray-900 mt-4">DIRECCIÓN</label>
                        <div class="mt-2">
                            <div class="mt-2">
                                <input @input="(val) => (sender.address = sender.address.toUpperCase())" 
                                    v-model="sender.address" type="text" name="sender_address" id="sender_address"
                                    autocomplete="given-name" disabled
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>

                        <label for="currency" class="block text font-medium leading-6 text-gray-900 mt-4">CALLE</label>
                        <div class="mt-2">
                            <div class="mt-2">
                                <input @input="(val) => (sender.street = sender.street.toUpperCase())" 
                                    v-model="sender.street" type="text" name="sender_address" id="sender_address"
                                    autocomplete="given-name" disabled
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>

                        <div class="grid  grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 mt-4">
                            <div class="sm:col-span-2">
                                <label for="first-name" class="block text font-medium leading-6 text-gray-900">NO.
                                    EXT</label>
                                <div class="mt-2">
                                    <input @input="(val) => (sender.exterior_number = sender.exterior_number.toUpperCase())"
                                         v-model="sender.exterior_number" type="number" name="first-name"
                                        id="desenlone" autocomplete="given-name" disabled
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="first-name" class="block text font-medium leading-6 text-gray-900">NO.
                                    INT</label>
                                <div class="mt-2">
                                    <input @input="(val) => (sender.interior_number = sender.interior_number.toUpperCase())"
                                         v-model="sender.interior_number" type="number" name="first-name"
                                        id="desenlone" autocomplete="given-name" disabled
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="first-name" class="block text font-medium leading-6 text-gray-900">PAIS</label>
                                <div class="mt-2">
                                    <input @input="(val) => (sender.country = Agreementdesenlone.toUpperCase())" 
                                        v-model="sender.country" type="text" name="first-name" id="desenlone"
                                        autocomplete="given-name" disabled
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                            </div>
                        </div>

                        <label for="currency" class="block text font-medium leading-6 text-gray-900 mt-4">CIUDAD</label>
                        <div class="mt-2">
                            <div class="mt-2">
                                <input :value="sender.city"  type="text" name="sender_address" id="sender_address"
                                    autocomplete="given-name" disabled
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>

                        <div class="grid  grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 mt-4">
                            <div class="sm:col-span-2">
                                <label for="first-name" class="block text font-medium leading-6 text-gray-900">C.P.</label>
                                <div class="mt-2">
                                    <input @input="(val) => (sender.postal_code = sender.postal_code.toUpperCase())"
                                         v-model="sender.postal_code" type="number" name="first-name" id="desenlone"
                                        autocomplete="given-name" disabled
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="first-name"
                                    class="block text font-medium leading-6 text-gray-900">TELEFONO</label>
                                <div class="mt-2">
                                    <input @input="(val) => (sender.interior_number = sender.interior_number.toUpperCase())"
                                         v-model="sender.interior_number" type="number" name="first-name"
                                        id="desenlone" autocomplete="given-name" disabled
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="first-name"
                                    class="block text font-medium leading-6 text-gray-900">ESTADO</label>
                                <div class="mt-2">
                                    <input @input="(val) => (sender.state = sender.state.toUpperCase())" 
                                        v-model="sender.state" type="text" name="first-name" id="desenlone"
                                        autocomplete="given-name" disabled
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="sm:col-span-3  p-4 border bg-gray-50">

                        <label for="currency" class="block text font-medium leading-6 text-gray-900">DESTINATARIO</label>
                        <div class="mt-2">
                            <select  id="origin" name="currency" autocomplete="currency" v-model="receiver"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option v-for="origin in origins_and_destinations" :value="origin">{{ origin.name }}
                                </option>
                            </select>
                        </div>

                        <label for="currency" class="block text font-medium leading-6 text-gray-900 mt-4">DIRECCIÓN</label>
                        <div class="mt-2">
                            <div class="mt-2">
                                <input @input="(val) => (receiver.address = receiver.address.toUpperCase())" 
                                    v-model="receiver.address" type="text" name="sender_address" id="sender_address"
                                    autocomplete="given-name" disabled
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>

                        <label for="currency" class="block text font-medium leading-6 text-gray-900 mt-4">CALLE</label>
                        <div class="mt-2">
                            <div class="mt-2">
                                <input @input="(val) => (receiver.street = receiver.street.toUpperCase())" 
                                    v-model="receiver.street" type="text" name="sender_address" id="sender_address"
                                    autocomplete="given-name" disabled
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>

                        <div class="grid  grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 mt-4">
                            <div class="sm:col-span-2">
                                <label for="first-name" class="block text font-medium leading-6 text-gray-900">NO.
                                    EXT</label>
                                <div class="mt-2">
                                    <input
                                        @input="(val) => (receiver.exterior_number = receiver.exterior_number.toUpperCase())"
                                         v-model="receiver.exterior_number" type="number" name="first-name"
                                        id="desenlone" autocomplete="given-name" disabled
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="first-name" class="block text font-medium leading-6 text-gray-900">NO.
                                    INT</label>
                                <div class="mt-2">
                                    <input
                                        @input="(val) => (receiver.interior_number = receiver.interior_number.toUpperCase())"
                                         v-model="receiver.interior_number" type="number" name="first-name"
                                        id="desenlone" autocomplete="given-name" disabled
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="first-name" class="block text font-medium leading-6 text-gray-900">PAIS</label>
                                <div class="mt-2">
                                    <input @input="(val) => (receiver.country = Agreement.desenlone.toUpperCase())" 
                                        v-model="receiver.country" type="text" name="first-name" id="desenlone"
                                        autocomplete="given-name" disabled
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                            </div>
                        </div>

                        <label for="currency" class="block text font-medium leading-6 text-gray-900 mt-4">CIUDAD</label>
                        <div class="mt-2">
                            <div class="mt-2">
                                <input :value="receiver.city"  type="text" name="sender_address" id="sender_address"
                                    autocomplete="given-name" disabled
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>

                        <div class="grid  grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 mt-4">
                            <div class="sm:col-span-2">
                                <label for="first-name" class="block text font-medium leading-6 text-gray-900">C.P.</label>
                                <div class="mt-2">
                                    <input @input="(val) => (receiver.postal_code = receiver.postal_code.toUpperCase())"
                                         v-model="receiver.postal_code" type="number" name="first-name"
                                        id="desenlone" autocomplete="given-name" disabled
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="first-name"
                                    class="block text font-medium leading-6 text-gray-900">TELEFONO</label>
                                <div class="mt-2">
                                    <input
                                        @input="(val) => (receiver.interior_number = receiver.interior_number.toUpperCase())"
                                         v-model="receiver.interior_number" type="number" name="first-name"
                                        id="desenlone" autocomplete="given-name" disabled
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="first-name"
                                    class="block text font-medium leading-6 text-gray-900">ESTADO</label>
                                <div class="mt-2">
                                    <input @input="(val) => (receiver.state = receiver.state.toUpperCase())" 
                                        v-model="receiver.state" type="text" name="first-name" id="desenlone"
                                        autocomplete="given-name" disabled
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="sm:col-span-3 ">

                        <label for="currency" class="block text font-medium leading-6 text-gray-900">PLANTA ORIGEN</label>
                        <div class="mt-2">
                            <select  id="origin" name="currency" autocomplete="currency"
                                v-model="Agreement.sender_fence_id"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option v-for="origin in fences" :value="origin.id">{{ origin.name }}
                                </option>
                            </select>
                        </div>

                    </div>

                    <div class="sm:col-span-3 ">

                        <label for="currency" class="block text font-medium leading-6 text-gray-900">PLANTA DESTINO</label>
                        <div class="mt-2">
                            <select  id="origin" name="currency" autocomplete="currency"
                                v-model="Agreement.receiver_fence_id"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option v-for="origin in fences" :value="origin.id">{{ origin.name }}
                                </option>
                            </select>
                        </div>

                    </div>

                    <div class="sm:col-span-3 ">

                        <label for="currency" class="block text font-medium leading-6 text-gray-900">TIPO DE
                            MOVIMIENTO</label>
                        <div class="mt-2">
                            <select  id="origin" name="currency" autocomplete="currency" v-model="Agreement.type"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option>
                                    IMPORTACION
                                </option>
                                <option>
                                    EXPORTACION
                                </option>
                            </select>
                        </div>

                    </div>

                    <div class="sm:col-span-3">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">SUELDO DE
                            IMPORTACION</label>
                        <div class="mt-2">
                            <input @input="(val) => (Agreement.import_salary = Agreement.import_salary.toUpperCase())" 
                                v-model="Agreement.import_salary" type="number" name="first-name" id="import_salary"
                                autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">DESENLONE</label>
                        <div class="mt-2">
                            <input @input="(val) => (Agreement.desenlone = Agreement.desenlone.toUpperCase())" 
                                v-model="Agreement.desenlone" type="number" name="first-name" id="desenlone"
                                autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">DESAMARRE</label>
                        <div class="mt-2">
                            <input @input="(val) => (Agreement.desamarre = Agreement.desamarre.toUpperCase())" 
                                v-model="Agreement.desamarre" type="number" name="desamarre" id="desenlone"
                                autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">BONO</label>
                        <div class="mt-2">
                            <input @input="(val) => (Agreement.voucher = Agreement.voucher.toUpperCase())" 
                                v-model="Agreement.voucher" type="number" name="desamarre" id="desenlone"
                                autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">POR CARGAR</label>
                        <div class="mt-2">
                            <input @input="(val) => (Agreement.to_load = Agreement.to_load.toUpperCase())" 
                                v-model="Agreement.to_load" type="number" name="desamarre" id="to_load" autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">AMARRE</label>
                        <div class="mt-2">
                            <input @input="(val) => (Agreement.amarre = Agreement.amarre.toUpperCase())" 
                                v-model="Agreement.amarre" type="number" name="desamarre" id="amarre" autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">ENLONE</label>
                        <div class="mt-2">
                            <input @input="(val) => (Agreement.enlone = Agreement.enlone.toUpperCase())" 
                                v-model="Agreement.enlone" type="number" name="desamarre" id="enlone" autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                    </div>


                    <div class="sm:col-span-3 ">
                        <label for="currency" class="block text font-medium leading-6 text-gray-900">MONEDA</label>
                        <div class="mt-2">
                            <select  id="origin" name="currency" autocomplete="currency" v-model="customer.currency"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option>
                                    DOLARES
                                </option>
                                <option>
                                    PESOS
                                </option>
                            </select>
                        </div>
                    </div>


                    <div class="sm:col-span-3 ">

                        <label for="currency" class="block text font-medium leading-6 text-gray-900">RUTA</label>
                        <div class="mt-2">
                            <select  id="origin" name="currency" autocomplete="currency" v-model="Agreement.route_id"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option v-for="route in routes" :value="route.id">{{ route.name }}
                                </option>
                            </select>
                        </div>

                    </div>

                </div>
            </div>
            <div class="flex items-center justify gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                <button type="button" class="text font-semibold leading-6 text-gray-900">CANCELAR</button>
                <button type="submit"
                    class="rounded bg-indigo-600 px-3 py-2 text font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">GUARDAR
                    convenio</button>
            </div>
        </form>
    </div>
</template>
<script setup>
import { Switch, SwitchGroup, SwitchLabel } from '@headlessui/vue'
import { reactive, watch } from 'vue';
import useAgreements from '../../composables/agreements.js';
import useOriginsAndDestinations from '../../composables/originDestinations';
import useRoutes from '../../composables/routes.js';
import useOwners from '../../composables/owners.js';
import useCustomers from '../../composables/customers.js'
import useFences from '../../composables/fences.js'

import { onMounted, ref, computed } from 'vue';

import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/20/solid'
import {
    Combobox,
    ComboboxButton,
    ComboboxInput,
    ComboboxOption,
    ComboboxOptions,
} from '@headlessui/vue'

const { errors, getAgreement, Agreement, updateAgreement } = useAgreements();
const { getOwners, owners } = useOwners();
const { getCustomers, customers } = useCustomers();
const { origins_and_destinations, getOriginsAndDestinations } = useOriginsAndDestinations();
const { fences, getFences } = useFences();
const { routes, getRoutes } = useRoutes();

var customer = ref({});
const sender = ref([]);
const receiver = ref([]);




const props = defineProps({
  id: String
});

const saveAgreement = async () => {
    console.log(customer.value);
    Agreement.value.customer_id = customer.value.id;
    Agreement.value.customer = customer.value;
    Agreement.value.sender_origin_and_destinations_id = sender.value.id;
    Agreement.value.sender = sender.value;
    Agreement.value.receiver_origin_and_destinations_id = receiver.value.id;
    Agreement.value.receiver = receiver.value;
    Agreement.value.currency = customer.value.currency;
    //console.log(form);
    //await storeAgreement({ ...form });
    updateAgreement(props.id);
}

onMounted(() => {
    getAgreement(props.id)
    getOriginsAndDestinations()
    getFences()
    getRoutes()
    getCustomers()
    
})

watch(Agreement, (newAgreement) => {
    customer.value = newAgreement.customer;
    sender.value = newAgreement.sender;
    receiver.value = newAgreement.receiver;
})

</script>