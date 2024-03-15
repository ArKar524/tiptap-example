<template>
    <div class="container mx-auto max-w-4xl mt-8 prose">
        <form @submit.prevent="submitForm">

            <div class="mb-2">
                <label for="title" class="text-black text-xl">Title</label>
                <input type="text" class="w-full rounded  mt-2 border border-gray-400 p-2" v-model="form.title" id="">
                <span v-if="form.errors.title" class="text-red-500">{{ form.errors.title }}</span>
            </div>

            <div class="mb-2">
                <Editor v-model="form.content" />
                <span v-if="form.errors.content" class="text-red-500">{{ form.errors.content }}</span>
            </div>
            <button type="submit"
                class="bg-blue-500 my-2 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</button>
        </form>

        <div class="my-4 border border-gray-400 rounded p-1">
            <h1 class="text-xl mb-0 mx-1">Posts Title</h1>
            <div class="border my-1 mx-1"></div>
            <span v-for="post in props.posts" class="mx-1">
                <Link :href="`post/${post.id}/show`">
                <button title="click to post-details"
                    class="bg-red-500 mb-1 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">{{ post.title
                    }}</button>

                </Link>
            </span>


        </div>
    </div>
</template>
<script setup>
import { useForm, Link } from "@inertiajs/vue3";
import Editor from "@/Components/Editor.vue"
import { ref } from "vue"

const props = defineProps({
    posts: Object,
})
const form = useForm({
    title: '',
    content: '',
})

const submitForm = () => {
    form.post('post')
    form.reset()
    form.content = ""
}


</script>

<style lang="scss" scoped></style>