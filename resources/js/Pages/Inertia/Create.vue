<script setup>

import { reactive} from 'vue';
import { Inertia } from '@inertiajs/inertia';

// defineの中には肩を指定する。
defineProps({
    errors: Object
})
const form = reactive({
    title: null,
    content: null,
})
const submitFunction = () => {
    Inertia.post('/inertia', form)
}
</script>

<template>
    <!-- ↓preventでSPA化 -->
    <form @submit.prevent="submitFunction"> <!-- ここではaction, methodは入れない。jsで処理を書く-->
        <input type="text" name="title" v-model="form.title"><br>
        <div v-if="errors.title">{{ errors.title }}</div><br>
        <input type="text" name="content" v-model="form.content"><br>
        <div v-if="errors.content">{{ errors.content }}</div><br>
        <button>送信</button>
    </form>
</template>