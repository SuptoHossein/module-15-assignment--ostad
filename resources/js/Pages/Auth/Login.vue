<script setup>
    import {Form, Field} from 'vee-validate'
    import { useForm } from '@inertiajs/vue3';
    import * as yup from 'yup'

    // use form from innertia
    const form = useForm({
        email       : '',
        password    : '',
        remember    : false
    });

    // schema create by yup
    const schema = yup.object({
        email : yup.string().email().required(),
        password : yup.string().required()
    });


    //submit login form
    const submit = ()=>{
        form.post(route('login'),{
            preserveScroll: true,
        });
    };

    
</script> 

<template>
<section class="bg-gray-200 dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <div class="flex items-center mb-6 text-2xl font-semibold text-gray-600 dark:text-white">
        <h3>Welcome Back</h3>
      </div>
      <div class="w-full bg-white rounded-lg shadow-lg shadow-blue-200 dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-600 md:text-2xl dark:text-white">
                  Sign in
              </h1>

              <Form class="space-y-4 md:space-y-6" @submit="submit" :validation-schema="schema" v-slot="{errors}">
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                      <Field type="email" v-model="form.email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your email" />
                      <span class="text-red-500 font-semibold text-sm ">{{ errors.email }}</span>
                      <span class="text-red-500 font-semibold text-sm " v-if="form.errors.email">{{ form.errors.email }}</span>
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                      <Field type="password" v-model="form.password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                      <span class="text-red-500 font-semibold text-sm">{{ errors.password }}</span>
                  </div>
                  <div class="flex items-center justify-between">
                      <div class="flex items-start">
                          <div class="flex items-center h-5">
                            <input id="remember" v-model="form.remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                          </div>
                          <div class="ml-3 text-sm">
                            <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                          </div>
                      </div>
                  </div>

                  <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign in</button>

                  <!-- <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      Don’t have an account yet? <a href="#" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                  </p> -->
                </Form>
              
          </div>
      </div>
  </div>
</section>
</template>

<style scoped>

</style>