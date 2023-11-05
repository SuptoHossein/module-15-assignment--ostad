<script setup>
    import AdminPanel from '@/Layouts/AdminPanel.vue'
    import {Link} from '@inertiajs/vue3'
    import { Icon } from '@iconify/vue';

    defineProps({
        customers:Array,
    });
</script>

<template>
    <AdminPanel>
        <!-- Breadcrumb -->
        <nav class="flex px-5 py-3 justify-end text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
            <Link :href="route('dashboard')" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
                Dashboard
            </Link>
            </li>
            <li>
            <div class="flex items-center">
                <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <Link :href="route('customers.index')" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Customers</Link>
            </div>
            </li>
        </ol>
        </nav>
        <!-- Breadcrumb -->
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            
            <div class="grid grid-flow-row auto-rows-max">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <h2 class="px-5 py-3 text-lg font-semibold text-left text-gray-600 bg-white dark:text-white dark:bg-gray-800">Our Customers</h2>
                    <div class="md:flex space-y-3 md:space-y-0 items-center justify-between px-4 pb-3">
                        <div>
                            <label for="table-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                                </div>
                                <input type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
                            </div>
                        </div>
                        
                        <div class="flex justify-between space-x-5">
                            <Link :href="route('customers.create')" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Create New</Link>
                        </div>
                    </div>
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Customer Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Gender
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Mobile
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" v-for="(customer, index) in customers" :key="index">
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ index+1 }}
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                     {{ customer.first_name+' '+customer.last_name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ customer.email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ customer.gender }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ customer.mobile_number }}
                                </td>
                                <td class="px-6 py-4 flex justify-center">
                                    <Link :href="route('customers.edit',customer.id)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mx-1"><Icon width="23" icon="bx:edit" /></Link>
                                    <Link :href="route('customers.destroy',customer.id)" method="delete" as="button" type="button" class="font-medium text-red-600 dark:text-red-500 hover:underline"><Icon width="25" icon="lucide:delete" /></Link>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot v-if="customers.length == 0">
                            <tr><td class="px-6 py-4 text-center text-lg" colspan="6">No Data Found Here</td></tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
        
    </AdminPanel>
</template>

<style scoped>

</style>