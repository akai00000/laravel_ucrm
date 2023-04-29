<script setup>
import { Link } from '@inertiajs/inertia-vue3';

    defineProps({
        blogs: Array,
    })
</script>

<template>
        InertiaTestテーブル内容
        <!-- ↓flashMessage -->
    <div class="alert bg-blue-400" v-if="$page.props.flash.message">
        {{ $page.props.flash.message }}  <!-- sessionと同様。一度のみ表示（middleware(handlar参照)) -->
    </div>
    <ui>
        <li v-for="blog in blogs" :key="blog.id">
            <!-- ↓vueへ飛ぶリンク。変数も渡せる。 -->
            テーブルID：{{ blog.id }};
            件名：<Link class="text-blue-400" :href="route('inertia.show', { id: blog.id})">{{ blog.title }};</Link>
            本文：{{ blog.content }}
        </li>
    </ui>
</template>