<script setup>
import { Inertia } from '@inertiajs/inertia';

// controllerから渡ってくる値はdefinePropsで定義できる。
    defineProps({
        // このときのidは「キー」のこと。
        id: String,
        // ↓一軒の時はarrayではなくobjectにする。
        blog: Object
    })
// 引数ひとつなら（）は消せる
const deleteConfirm = id => {
    console.log(id);
    Inertia.delete(`/inertia/${id}`,{
        onBefore: () => confirm('Are you sure you want to delete this user?')
    })
}
</script>

<template>
    {{ blog.id }}<br>
    {{ blog.title }}<br>
    <button @click="deleteConfirm(blog.id)">削除</button>
</template>