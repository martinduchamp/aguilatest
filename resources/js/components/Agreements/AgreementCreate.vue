<template>
    <div class="">
        <form @submit.prevent="saveAgreement()" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded  uppercase">
            <div class="px-4 py-6 sm:p-8">
                <h2 class="my-8 text-3xl font-extrabold dark:text-white">Nuevo Convenio</h2>
                <div class="grid  grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">


                    <div class="col-span-full">

                        <label for="currency" class="block text font-medium leading-6 text-gray-900">CLIENTE</label>
                        <div class="mt-2">
                            <select required id="currency" name="currency" autocomplete="currency" v-model="customer"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option v-for="owner in customers" :value="owner">{{ owner.name }}</option>
                            </select>
                        </div>

                    </div>

                    <div class="sm:col-span-3   p-4 border bg-gray-50">

                        <label for="currency" class="block text font-medium leading-6 text-gray-900">REMITENTE</label>
                        <div class="mt-2">
                            <select required id="origin" name="currency" autocomplete="currency" v-model="sender"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option v-for="sender in origins_and_destinations" :value="sender">{{ sender.name }}
                                </option>
                            </select>
                        </div>

                        <label for="currency" class="block text font-medium leading-6 text-gray-900 mt-4">DIRECCIÓN</label>
                        <div class="mt-2">
                            <div class="mt-2">
                                <input @input="(val) => (sender.address = sender.address.toUpperCase())" required
                                    v-model="sender.address" type="text" name="sender_address" id="sender_address"
                                    autocomplete="given-name" disabled
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>

                        <label for="currency" class="block text font-medium leading-6 text-gray-900 mt-4">CALLE</label>
                        <div class="mt-2">
                            <div class="mt-2">
                                <input @input="(val) => (sender.street = sender.street.toUpperCase())" required
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
                                        required v-model="sender.exterior_number" type="number" name="first-name"
                                        id="desenlone" autocomplete="given-name" disabled
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="first-name" class="block text font-medium leading-6 text-gray-900">NO.
                                    INT</label>
                                <div class="mt-2">
                                    <input @input="(val) => (sender.interior_number = sender.interior_number.toUpperCase())"
                                        required v-model="sender.interior_number" type="number" name="first-name"
                                        id="desenlone" autocomplete="given-name" disabled
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="first-name" class="block text font-medium leading-6 text-gray-900">PAIS</label>
                                <div class="mt-2">
                                    <input @input="(val) => (sender.country = form.desenlone.toUpperCase())" required
                                        v-model="sender.country" type="text" name="first-name" id="desenlone"
                                        autocomplete="given-name" disabled
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                            </div>
                        </div>

                        <label for="currency" class="block text font-medium leading-6 text-gray-900 mt-4">CIUDAD</label>
                        <div class="mt-2">
                            <div class="mt-2">
                                <input :value="sender.city" required type="text" name="sender_address" id="sender_address"
                                    autocomplete="given-name" disabled
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>

                        <div class="grid  grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 mt-4">
                            <div class="sm:col-span-2">
                                <label for="first-name" class="block text font-medium leading-6 text-gray-900">C.P.</label>
                                <div class="mt-2">
                                    <input @input="(val) => (sender.postal_code = sender.postal_code.toUpperCase())"
                                        required v-model="sender.postal_code" type="number" name="first-name" id="desenlone"
                                        autocomplete="given-name" disabled
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="first-name"
                                    class="block text font-medium leading-6 text-gray-900">TELEFONO</label>
                                <div class="mt-2">
                                    <input @input="(val) => (sender.interior_number = sender.interior_number.toUpperCase())"
                                        required v-model="sender.interior_number" type="number" name="first-name"
                                        id="desenlone" autocomplete="given-name" disabled
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="first-name"
                                    class="block text font-medium leading-6 text-gray-900">ESTADO</label>
                                <div class="mt-2">
                                    <input @input="(val) => (sender.state = sender.state.toUpperCase())" required
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
                            <select required id="origin" name="currency" autocomplete="currency" v-model="receiver"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option v-for="origin in origins_and_destinations" :value="origin">{{ origin.name }}
                                </option>
                            </select>
                        </div>

                        <label for="currency" class="block text font-medium leading-6 text-gray-900 mt-4">DIRECCIÓN</label>
                        <div class="mt-2">
                            <div class="mt-2">
                                <input @input="(val) => (receiver.address = receiver.address.toUpperCase())" required
                                    v-model="receiver.address" type="text" name="sender_address" id="sender_address"
                                    autocomplete="given-name" disabled
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>

                        <label for="currency" class="block text font-medium leading-6 text-gray-900 mt-4">CALLE</label>
                        <div class="mt-2">
                            <div class="mt-2">
                                <input @input="(val) => (receiver.street = receiver.street.toUpperCase())" required
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
                                        required v-model="receiver.exterior_number" type="number" name="first-name"
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
                                        required v-model="receiver.interior_number" type="number" name="first-name"
                                        id="desenlone" autocomplete="given-name" disabled
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="first-name" class="block text font-medium leading-6 text-gray-900">PAIS</label>
                                <div class="mt-2">
                                    <input @input="(val) => (receiver.country = form.desenlone.toUpperCase())" required
                                        v-model="receiver.country" type="text" name="first-name" id="desenlone"
                                        autocomplete="given-name" disabled
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                            </div>
                        </div>

                        <label for="currency" class="block text font-medium leading-6 text-gray-900 mt-4">CIUDAD</label>
                        <div class="mt-2">
                            <div class="mt-2">
                                <input :value="receiver.city" required type="text" name="sender_address" id="sender_address"
                                    autocomplete="given-name" disabled
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>

                        <div class="grid  grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 mt-4">
                            <div class="sm:col-span-2">
                                <label for="first-name" class="block text font-medium leading-6 text-gray-900">C.P.</label>
                                <div class="mt-2">
                                    <input @input="(val) => (receiver.postal_code = receiver.postal_code.toUpperCase())"
                                        required v-model="receiver.postal_code" type="number" name="first-name"
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
                                        required v-model="receiver.interior_number" type="number" name="first-name"
                                        id="desenlone" autocomplete="given-name" disabled
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="first-name"
                                    class="block text font-medium leading-6 text-gray-900">ESTADO</label>
                                <div class="mt-2">
                                    <input @input="(val) => (receiver.state = receiver.state.toUpperCase())" required
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
                            <select required id="origin" name="currency" autocomplete="currency"
                                v-model="form.sender_fence_id"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option v-for="origin in fences" :value="origin.id">{{ origin.name }}
                                </option>
                            </select>
                        </div>

                    </div>

                    <div class="sm:col-span-3 ">

                        <label for="currency" class="block text font-medium leading-6 text-gray-900">PLANTA DESTINO</label>
                        <div class="mt-2">
                            <select required id="origin" name="currency" autocomplete="currency"
                                v-model="form.receiver_fence_id"
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
                            <select required id="origin" name="currency" autocomplete="currency" v-model="form.type"
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
                            <input @input="(val) => (form.import_salary = form.import_salary.toUpperCase())" required
                                v-model="form.import_salary" type="number" name="first-name" id="import_salary"
                                autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">DESENLONE</label>
                        <div class="mt-2">
                            <input @input="(val) => (form.desenlone = form.desenlone.toUpperCase())" required
                                v-model="form.desenlone" type="number" name="first-name" id="desenlone"
                                autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">DESAMARRE</label>
                        <div class="mt-2">
                            <input @input="(val) => (form.desamarre = form.desamarre.toUpperCase())" required
                                v-model="form.desamarre" type="number" name="desamarre" id="desenlone"
                                autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">BONO</label>
                        <div class="mt-2">
                            <input @input="(val) => (form.voucher = form.voucher.toUpperCase())" required
                                v-model="form.voucher" type="number" name="desamarre" id="desenlone"
                                autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">POR CARGAR</label>
                        <div class="mt-2">
                            <input @input="(val) => (form.to_load = form.to_load.toUpperCase())" required
                                v-model="form.to_load" type="number" name="desamarre" id="to_load" autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">AMARRE</label>
                        <div class="mt-2">
                            <input @input="(val) => (form.amarre = form.amarre.toUpperCase())" required
                                v-model="form.amarre" type="number" name="desamarre" id="amarre" autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">ENLONE</label>
                        <div class="mt-2">
                            <input @input="(val) => (form.enlone = form.enlone.toUpperCase())" required
                                v-model="form.enlone" type="number" name="desamarre" id="enlone" autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                    </div>


                    <div class="sm:col-span-3 ">
                        <label for="currency" class="block text font-medium leading-6 text-gray-900">MONEDA</label>
                        <div class="mt-2">
                            <select required id="origin" name="currency" autocomplete="currency" v-model="customer.currency"
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
                            <select required id="origin" name="currency" autocomplete="currency" v-model="form.route_id"
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
import { reactive } from 'vue';
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

const { errors, storeAgreement } = useAgreements();
const { getOwners, owners } = useOwners();
const { getCustomers, customers } = useCustomers();
const { origins_and_destinations, getOriginsAndDestinations } = useOriginsAndDestinations();
const { fences, getFences } = useFences();
const { routes, getRoutes } = useRoutes();

const customer = ref({});
const sender = ref([]);
const receiver = ref([]);

const form = reactive({
   'customer_id': '',
   'sender_origin_and_destinations_id': '',
   'receiver_origin_and_destinations_id': ''
})




const saveAgreement = async () => {
    
    form.customer_id = customer.value.id;
    form.sender_origin_and_destinations_id = sender.value.id;
    form.receiver_origin_and_destinations_id = receiver.value.id;
    form.currency = customer.value.currency;
    console.log(form);
    await storeAgreement({ ...form });
}

onMounted(() => {
    // getOwners()
    getOriginsAndDestinations()
    getFences()
    getRoutes()
    getCustomers()
})

</script>