<template>
    <div class="container mx-auto max-w-4xl mt-8 prose">
        <form @submit.prevent="submitForm">
            <input type="text" class="w-full my-4" v-model="form.title" id="">
            <Editor v-model="form.content" />
            <button type="submit"
                class="bg-blue-500 my-2 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</button>
        </form>

        <ul>
            <li v-for="post in props.posts">
                <Link :href="`post/${post.id}/show`" class=" hover:underline underline decoration-none text-blue-400">
                {{ post.title }}
                </Link>
            </li>
        </ul>
    </div>
</template>
<script setup>
import { useForm, Link } from "@inertiajs/vue3";
import Editor from "@/Components/Editor.vue"

const props = defineProps({
    posts: Object,
})
const form = useForm({
    title: '',
    content: '<h1>Header 1</h1><p>I’m running Tiptap with Vue.js.!! 🎉</p>',
})

const submitForm = () => {
    form.post('post')
}


</script>

<style lang="scss" scoped></style>