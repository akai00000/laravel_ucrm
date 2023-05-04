<script setup>

</script>
<template>
    <!-- ↓flashMessage 
    サクセスはもともと決まっている。-->
    <div v-if="$page.props.flash.status === 'success'"
        class="bg-blue-300 text-white p-4">
        {{ $page.props.flash.message }}  <!-- sessionと同様。一度のみ表示（middleware(handlar参照)) -->
    </div>
    <div v-if="$page.props.flash.status === 'danger'"
        class="bg-red-400 text-white p-4">
        {{ $page.props.flash.message }}  <!-- sessionと同様。一度のみ表示（middleware(handlar参照)) -->
    </div>
</template>