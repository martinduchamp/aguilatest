<template>
    <div class="">
        <form @submit.prevent="saveAgreement()" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded  uppercase">
            <div class="px-4 py-6 sm:p-8">
                <h2 class="my-8 text-3xl font-extrabold dark:text-white">Nuevo Convenio</h2>
                <div class="grid  grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">


                    <div class="col-span-full">

                        <label for="currency" class="block text font-medium leading-6 text-gray-900">CLIENTE</label>
                        <div class="mt-2">
                            <select  id="currency" name="currency" autocomplete="currency" v-model="customer"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option v-for="owner in customers" :value="owner">{{ owner.name }}</option>
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
                                    <input @input="(val) => (sender.country = form.desenlone.toUpperCase())" 
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
                                    <input @input="(val) => (receiver.country = form.desenlone.toUpperCase())" 
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
                            <select  id="origin" name="currency" autocomplete="currency"
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
                            <select  id="origin" name="currency" autocomplete="currency" v-model="form.type"
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
                            <input @input="(val) => (form.import_salary = form.import_salary.toUpperCase())" 
                                v-model="form.import_salary" type="number" name="first-name" id="import_salary"
                                autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                    </div>


                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">DESENLONE</label>
                        <div class="mt-2">
                            <input @input="(val) => (form.desenlone = form.desenlone.toUpperCase())" 
                                v-model="form.desenlone" type="number" name="first-name" id="desenlone"
                                autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">DESAMARRE</label>
                        <div class="mt-2">
                            <input @input="(val) => (form.desamarre = form.desamarre.toUpperCase())" 
                                v-model="form.desamarre" type="number" name="desamarre" id="desenlone"
                                autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">BONO</label>
                        <div class="mt-2">
                            <input @input="(val) => (form.voucher = form.voucher.toUpperCase())" 
                                v-model="form.voucher" type="number" name="desamarre" id="desenlone"
                                autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">POR CARGAR</label>
                        <div class="mt-2">
                            <input @input="(val) => (form.to_load = form.to_load.toUpperCase())" 
                                v-model="form.to_load" type="number" name="desamarre" id="to_load" autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">AMARRE</label>
                        <div class="mt-2">
                            <input @input="(val) => (form.amarre = form.amarre.toUpperCase())" 
                                v-model="form.amarre" type="number" name="desamarre" id="amarre" autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text font-medium leading-6 text-gray-900">ENLONE</label>
                        <div class="mt-2">
                            <input @input="(val) => (form.enlone = form.enlone.toUpperCase())" 
                                v-model="form.enlone" type="number" name="desamarre" id="enlone" autocomplete="given-name"
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
                            <select  id="origin" name="currency" autocomplete="currency" v-model="form.route_id"
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


    <TransitionRoot as="template" :show="open">
        <Dialog as="div" class="relative z-10" @close="open = false">
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100"
                leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
            </TransitionChild>

            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <TransitionChild as="template" enter="ease-out duration-300"
                        enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200"
                        leave-from="opacity-100 translate-y-0 sm:scale-100"
                        leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                        <DialogPanel
                            class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                            <div class="sm:flex sm:items-start">
                               
                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                    <DialogTitle as="h3" class="text-base font-semibold leading-6 text-gray-900">AGREGAR
                                        CONCEPTO AL CONVENIO</DialogTitle>
                                    <div class="mt-2">

                                        <form @submit.prevent="saveAgreement()" class="uppercase">
                                            <div class="">

                                                <div class="grid  grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">


                                                    <div class="col-span-full">

                                                        <label for="currency"
                                                            class="block text font-medium leading-6 text-gray-900">CONCEPTO</label>
                                                        <div class="mt-2">
                                                            <select  id="currency" name="currency"
                                                                autocomplete="currency" v-model="newFee"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                                <option v-for="fee in fees" :value="fee">{{ fee.concept }}
                                                                </option>
                                                            </select>
                                                        </div>

                                                    </div>

                                                    <div class="sm:col-span-2">
                                                        <label for="first-name"
                                                            class="block text font-medium leading-6 text-gray-900">NO.
                                                            EXT</label>
                                                        <div class="mt-2">
                                                            <input
                                                                @input="(val) => (sender.exterior_number = sender.exterior_number.toUpperCase())"
                                                                 v-model="sender.exterior_number" type="number"
                                                                name="first-name" id="desenlone" autocomplete="given-name"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                                <button type="button"
                                    class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 sm:ml-3 sm:w-auto"
                                    @click="addFee()">AGREGAR</button>
                                <button type="button"
                                    class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto"
                                    @click="open = false" ref="cancelButtonRef">CANCELAR</button>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
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
import useFees from '../../composables/fees.js'

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
const { fees, getFees } = useFees();

const customer = ref({});
const sender = ref([]);
const receiver = ref([]);
const fee = ref([]);
const agreementFees = reactive([]);
const newFee = ref({});

const form = reactive({
    'customer_id': '',
    'sender_origin_and_destinations_id': '',
    'receiver_origin_and_destinations_id': ''
})

const people = [


    { name: 'FLETES', title: '577.0', email: 'SI', role: 'Member' },
    { name: 'FLETES', title: '577.0', email: 'SI', role: 'Member' },
    { name: 'FLETES', title: '577.0', email: 'SI', role: 'Member' },
    { name: 'FLETES', title: '577.0', email: 'SI', role: 'Member' },
    { name: 'FLETES', title: '577.0', email: 'SI', role: 'Member' },
    { name: 'FLETES', title: '577.0', email: 'SI', role: 'Member' },
    // More people...
]

const projects = [


    {
        id: 1,
        name: 'Logo redesign',
        description: 'New logo and digital asset playbook.',
        hours: '20.0',
        rate: '$100.00',
        price: '$2,000.00',
    },
    // More projects...
]


import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { ExclamationTriangleIcon } from '@heroicons/vue/24/outline'

const open = ref(false)


const saveAgreement = async () => {

    form.customer_id = customer.value.id;
    form.sender_origin_and_destinations_id = sender.value.id;
    form.receiver_origin_and_destinations_id = receiver.value.id;
    form.currency = customer.value.currency;
    console.log(form);
    await storeAgreement({ ...form });
}

function addFee() {
    open.value = false
    agreementFees.push(newFee.value);
}

onMounted(() => {
    // getOwners()
    getOriginsAndDestinations();
    getFences();
    getRoutes();
    getCustomers();
    getFees();
})

</script>