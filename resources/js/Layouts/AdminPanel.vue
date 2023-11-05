<script setup>
    import Navbar from './Navbar.vue';
    import Sidebar from './Sidebar.vue'
</script>

<template>

<Navbar/>

<Sidebar/>

<div class="p-4 sm:ml-64">

   <div class="mt-16 space-y-5">
     <slot></slot> 
   </div>
   
</div>
</template>

<style scoped>

</style>