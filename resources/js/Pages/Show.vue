<template>
    <div class="container mx-auto max-w-4xl mt-8 prose">
        <p v-html="post.content" class="border rounded border-gray-400 p-4  overflow-y-auto outline-none"></p>

        <Link href="/post" preserve-scroll>
        <button class="p-2 px-3 bg-blue-600 rounded text-white">Back</button>

        </Link>
    </div>
</template>
<script setup>
import { useForm, Link } from "@inertiajs/vue3";
import Editor from "@/Components/Editor.vue"

const props = defineProps({
    post: Object,
})


</script>

<style lang="scss" scoped></style>