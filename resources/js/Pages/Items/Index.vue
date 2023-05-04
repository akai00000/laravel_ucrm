<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import FlashMessage from '@/Components/FlashMessage.vue';

defineProps({
    items: Array
})
</script>

<template>
    <Head title="商品一覧" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                商品一覧
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <section class="text-gray-600 body-font">
                            <div class="container px-5 py-10 mx-auto">
                                <FlashMessage />
                                <div class="lg:w-3/4 w-full mx-auto overflow-auto">
                                    <table class="table-auto w-full text-left whitespace-no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-lg bg-gray-100">No.</th>
                                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-lg bg-gray-100 rounded-tl rounded-bl">メニュー</th>
                                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-lg bg-gray-100">メニュー詳細</th>
                                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-lg bg-gray-100">金額</th>
                                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-lg bg-gray-100">残数</th>
                                                <th class="bg-gray-100">
                                                    <img src="/images/research.png" alt="Image" class="px-4 py-3" style="max-width:60px; max-height:60px; margin-left: 25px;">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="item in items" :key="item.id">
                                                <td class="border-t-2 border-gray-200 px-4 py-3">
                                                    <!-- <Link class="text-blue-600" :href="route('items.show', {item: item.id})"> -->
                                                        {{ item.id }}
                                                    <!-- </Link> -->
                                                </td>
                                                <td class="border-t-2 border-gray-200 px-4 py-3">{{ item.name }}</td>
                                                <td class="border-t-2 border-gray-200 px-4 py-3">{{ item.memo }}</td>
                                                <td class="border-t-2 border-gray-200 px-4 py-3">{{ item.price }}</td>
                                                <td class="border-t-2 border-gray-200 px-4 py-3 text-gray-900">
                                                    <span v-if="item.is_selling == 1">販売中</span>
                                                    <span v-if="item.is_selling != 1">売り切れ</span>
                                                </td>
                                                <td class="border-t-2 border-gray-200 px-4 py-3 text-center">
                                                    <Link :href="route('items.show', {item: item.id})">
                                                        <button class=" text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded text-lg">
                                                            詳細
                                                        </button>
                                                    </Link>
                                                </td>
                                                <!-- <td class="w-10 text-center">
                                                    <input name="plan" type="radio">
                                                </td> -->
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
