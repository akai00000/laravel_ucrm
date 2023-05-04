<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ValidationErrors from '@/Components/ValidationErrors.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { reactive} from 'vue';
import { Inertia } from '@inertiajs/inertia';

// defineの中には肩を指定する。
defineProps({
    errors: Object
})
const form = reactive({
    name: null,
    memo: null,
    price: null,
    is_selling: null,
})
const storeItem = () => {
    Inertia.post('/items', form)
}
</script>

<template>
    <Head title="商品登録" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                商品登録
            </h2>
            <section class="text-gray-600 body-font relative">
                <!-- ↓入力に不備があった時、エラーを出して処理を中断する。 -->
                <ValidationErrors :errors="errors" />
                <form @submit.prevent="storeItem">
                    <div class="lg:w-1/3 md:w-2/3 mx-auto">
                        <div class="relative mb-4">
                            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">商品情報を入力してください</h2>
                            <!-- <p class="leading-relaxed mb-5 text-gray-600">Post-ironic portland shabby chic echo park, banjo fashion axe</p> -->
                            <div class="relative mb-4">
                                <label for="name" class="leading-7 text-sm text-gray-600">商品名</label>
                                <input type="text" id="name" name="name" v-model="form.name" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="relative mb-4">
                            <label for="memo" class="leading-7 text-sm text-gray-600">商品の詳細</label>
                            <textarea type="text" id="memo" name="memo" v-model="form.memo" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                        </div>
                        <div class="relative mb-4">
                            <label for="price" class="leading-7 text-sm text-gray-600">商品の値段</label>
                            <input type="number" id="price" name="price" v-model="form.price" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="is_selling" class="leading-7 text-sm text-gray-600">販売状況</label>
                            <input type="number" id="is_selling" name="is_selling" v-model="form.is_selling" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <button class=" text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録</button>
                    </div>
                </form>    
            </section>
        </template>
    </AuthenticatedLayout>
</template>
