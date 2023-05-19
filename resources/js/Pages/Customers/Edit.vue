<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { reactive} from 'vue';
import { Inertia } from '@inertiajs/inertia';


// 編集必要のため、変数に格納（definePropsは一つしか記述できない）
const props = defineProps({
    errors: Object,
    item: Object
})


const form = reactive({
    id: props.item.id,
    name: props.item.name,
    memo: props.item.memo,
    price: props.item.price, 
    is_selling: props.item.is_selling 
})
const updateItem = id => {
    // putはroute:listの情報と合わせる
    Inertia.put(route('items.update', {item: id}), form)
}
</script>

<template>
    <Head title="商品編集" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                商品編集
            </h2>
            <section class="text-gray-600 body-font relative">
                <!-- ↓入力に不備があった時、エラーを出して処理を中断する。 -->
                <ValidationErrors :errors="errors" />
                <form @submit.prevent="updateItem(form.id)">
                    <div class="lg:w-1/3 md:w-2/3 mx-auto">
                        <div class="relative mb-4">
                            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">編集してください</h2>
                            <div class="relative mb-4">
                                <label for="name" class="leading-7 text-lg text-gray-600">商品名</label>
                                <input type="text" id="name" name="name" v-model="form.name" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="relative mb-4">
                            <label for="memo" class="leading-7 text-lg text-gray-600">商品の詳細</label>
                            <input type="text" id="memo" name="memo" v-model="form.memo" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="price" class="leading-7 text-lg text-gray-600">商品の値段</label>
                            <input type="number" id="price" name="price" v-model="form.price" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="is_selling" class="leading-7 text-lg text-gray-600 pr-5">販売状況</label>
                            <input type="radio" style="margin-bottom:5px;" id="is_selling" name="is_selling" v-model="form.is_selling" value="1">
                            販売中
                            <input type="radio" style="margin-bottom:5px;" id="is_selling" name="is_selling" v-model="form.is_selling" value="0">
                            売り切れ
                        </div>
                        <div class="p-2 w-full">
                            <button class="flex mx-auto text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                                更新
                            </button>
                        </div>
                    </div>
                </form>    
            </section>
        </template>
    </AuthenticatedLayout>
</template>
