<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import FlashMessage from '@/Components/FlashMessage.vue';
import { onMounted } from 'vue';
import Pagination from '@/Components/Pagination.vue';

const test = defineProps({
   customers: Object //paginationはobjectで取得される
})
onMounted( () => {
    console.log(test.customers.links.length);
})
</script>

<template>
    <ul v-for="customer in customers.data" :key="customer.id">
        <li>{{ customer.id }}</li>
        <li>{{ customer.name }}</li>
    </ul>
<Pagination 
    class="mt-6" :links="customers.links"> <!-- ここで:linkはpagination.vueに渡すlinkプロパティをあらわす。vue側では、definepropsで受け取っている。-->
</Pagination>
</template>
