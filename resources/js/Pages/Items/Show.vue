<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { nl2br } from '@/nl2br.js';
import { Inertia } from '@inertiajs/inertia';


// defineの中には肩を指定する。
defineProps({
    item: Object
})

const deleteItem = id => {
    // putはroute:listの情報と合わせる
    Inertia.delete(route('items.destroy', {item: id}), {
        onBefore: () => confirm('本当に削除しますか？')
    })
}
</script>

<template>
    <Head title="商品の詳細" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                商品の詳細
            </h2>
            <!-- <section class="text-gray-600 body-font relative"> -->
                    <div class="lg:w-1/3 md:w-2/3 mx-auto">
                        <div class="relative mb-4">
                            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">商品情報の詳細</h2>
                            <div class="relative mb-4">
                                <label for="name" class="leading-7 text-sm text-gray-600">商品名</label>
                                <div id="name" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    {{ item.name }}
                                </div>
                            </div>
                        </div>
                        <div class="relative mb-4">
                            <label for="memo" class="leading-7 text-sm text-gray-600">商品の詳細</label>
                            <div id="memo" v-html="nl2br(item.memo)" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="relative mb-4">
                            <label for="price" class="leading-7 text-sm text-gray-600">商品の値段</label>
                            <div id="price" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                {{ item.price }}
                            </div>
                        </div>
                        <div class="relative mb-4">
                            <label for="status" class="leading-7 text-sm text-gray-600">販売状況</label>
                            <div id="is_selling" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <span v-if="item.is_selling == 1">販売中</span>
                                <span v-if="item.is_selling != 1">売り切れ</span>
                            </div>
                        </div>
                        <Link as="button" :href="route('items.edit', {item: item.id})" class="w-full text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded text-lg">
                            編集
                        </Link>
                    </div>
                    <div class="p-2 mt-10 w-full">
                        <button @click="deleteItem(item.id)" class="flex mx-auto text-white bg-red-600 border-0 py-2 px-6 focus:outline-none hover:bg-red-700 rounded text-lg">
                        削除
                        </button>
                    </div>
            <!-- </section> -->
        </template>
    </AuthenticatedLayout>
</template>
