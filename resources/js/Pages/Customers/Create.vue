<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ValidationErrors from '@/Components/ValidationErrors.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { reactive} from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Core as YubinBngoCore } from 'yubinBango-core2';

// defineの中には肩を指定する。
defineProps({
    errors: Object
})
const form = reactive({
    name: null,
    kana: null,
    tel: null,
    email: null,
    postcode: null,
    address: null,
    birth: null,
    memo: null,
    gender: null,
})
const storeCustomer = () => {
    Inertia.post('/customer', form)
}
const fetchAddress = () => {
    new YubinBngoCore(String(form.postcode), (value) => {
        form.address = value.region + value.locality + value.street
    })
}
</script>

<template>
    <Head title="顧客登録" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                顧客登録
            </h2>
            <section class="text-gray-600 body-font relative">
                <!-- ↓入力に不備があった時、エラーを出して処理を中断する。 -->
                <ValidationErrors :errors="errors" />

                <form @submit.prevent="storeCustomer">
                    <div class="md:w-2/3 mx-auto">
                        <div class="relative mb-4">
                            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">顧客情報を入力してください</h2>
                            <div class="relative mb-4">
                                <label for="name" class="leading-7 text-sm text-gray-600">顧客氏名</label>
                                <input type="text" id="name" name="name" v-model="form.name" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="relative mb-4">
                            <label for="kana" class="leading-7 text-sm text-gray-600">フリガナ</label>
                            <input type="text" id="kana" name="kana" v-model="form.kana" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="tel" class="leading-7 text-sm text-gray-600">電話番号</label>
                            <input type="number" id="tel" name="tel" v-model="form.tel" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="email" class="leading-7 text-sm text-gray-600">E-mail</label>
                            <input type="text" id="email" name="email" v-model="form.email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="postcode" class="leading-7 text-sm text-gray-600">郵便番号</label>
                            <input type="number" id="postcode" name="postcode" @change="fetchAddress" v-model="form.postcode" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="address" class="leading-7 text-sm text-gray-600">住所</label>
                            <input type="text" id="address" name="address" v-model="form.address" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="birth" class="leading-7 text-sm text-gray-600">誕生日</label>
                            <input type="date" id="birth" name="birth" v-model="form.birth" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="memo" class="leading-7 text-sm text-gray-600">備考</label>
                            <textarea type="text" id="memo" name="memo" v-model="form.memo" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                        </div>
                        <div class="relative mb-4 d-flex">
                            <label class="leading-7 text-sm text-gray-600">性別</label><br>
                            <input type="radio" id="gender0" name="gender" v-model="form.gender" value="0" class="flex-row bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base leading-8 transition-colors duration-200">
                            <label for="gender0" class="leading-7 text-sm text-gray-600 flex-row mr-6">男性</label>
                            <input type="radio" id="gender1" name="gender" v-model="form.gender" value="1" class="flex-row bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base leading-8 transition-colors duration-200">
                            <label for="gender1" class="leading-7 text-sm text-gray-600 flex-row mr-6">女性</label>
                            <input type="radio" id="gender2" name="gender" v-model="form.gender" value="2" class="flex-row bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base leading-8 transition-colors duration-200">
                            <label for="gender2" class="leading-7 text-sm text-gray-600 flex-row mr-6">その他</label>
                        </div>
                        <button class=" text-white bg-green-600 border-0 py-2 px-6 focus:outline-none hover:bg-green-700 rounded text-lg">
                            顧客登録
                        </button>
                    </div>
                </form>

            </section>
        </template>
    </AuthenticatedLayout>
</template>
