<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import FlashMessage from '@/Components/FlashMessage.vue';
import Pagination from '@/Components/Pagination.vue';
import { Inertia } from '@inertiajs/inertia';
import { ref } from 'vue';

defineProps({
   customers: Object //paginationはobjectで取得される
})

const search = ref('')

// refの値を取得するためには .valueが必要
// Inertiaのルーティングでconntrollerに値を渡す（コントローラーメソッドが走る）
const searchCustomers = () => {
    Inertia.get(route('customer.index', { search: search.value }))
}

</script>

<template>
    <Head title="顧客一覧" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                顧客一覧
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <section class="text-gray-600 body-font">
                            <div class="container px-5 py-10 mx-auto">
                                <FlashMessage />
                                <div class="d-flex flex-wrap py-5">
                                    <div class="flex-row">
                                        <Link as="button" :href="route('customer.create')" class="mr-5 text-white bg-green-500 border-0 py-3 px-4 focus:outline-none hover:bg-green-600 rounded text-lg">
                                        顧客登録
                                        </Link>
                                    </div>
                                    <div class="flex-row float-right">
                                        <input type="text" v-model="search" class="mr-3 py-2 px-2 focus:outline-none hover:bg-blue-100 rounded text-lg">
                                        <button @click="searchCustomers()" class="text-white bg-blue-500 border-0 py-2 px-2 focus:outline-none hover:bg-blue-600 rounded text-lg">
                                        顧客検索
                                        </button>
                                    </div>
                                    </div>
                                <div class="w-full mx-auto overflow-auto">
                                    <table class="table-auto w-full text-left whitespace-no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-lg bg-gray-100">No.</th>
                                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-lg bg-gray-100 rounded-tl rounded-bl">氏名</th>
                                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-lg bg-gray-100">カナ</th>
                                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-lg bg-gray-100">電話番号</th>
                                                <th class="bg-gray-100">
                                                    <img src="/images/research.png" alt="Image" class="px-4 py-3" style="max-width:60px; max-height:60px; margin-left: 25px;">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="customer in customers.data" :key="customer.id">
                                                <td class="border-t-2 border-gray-200 px-4 py-3">{{ customer.id }}</td>
                                                <td class="border-t-2 border-gray-200 px-4 py-3">{{ customer.name }}</td>
                                                <td class="border-t-2 border-gray-200 px-4 py-3">{{ customer.kana }}</td>
                                                <td class="border-t-2 border-gray-200 px-4 py-3">{{ customer.tel }}</td>
                                                <!-- <td class="border-t-2 border-gray-200 px-4 py-3 text-center">
                                                    <Link :href="route('customer.show', {customer: customer.id})">
                                                        <button class=" text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded text-lg">
                                                            詳細
                                                        </button>
                                                    </Link>
                                                </td> -->

                                                <!-- <td class="w-10 text-center">
                                                    <input name="plan" type="radio">
                                                </td> -->
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <Pagination 
                                    class="mt-6" :links="customers.links"> <!-- ここで:linkはpagination.vueに渡すlinkプロパティをあらわす。vue側では、definepropsで受け取っている。-->
                                </Pagination>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
