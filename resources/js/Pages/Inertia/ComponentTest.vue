<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import TextInput from '@/Components/TextInput.vue';

const emitTest = e => console.log(e);
</script>

<template>
    <GuestLayout>
        ComponentTestページ<br>
        <TextInput modelValue = "初期値が入ります。" @update:modelValue="emitTest">
            
        </TextInput>
    </GuestLayout>
</template>