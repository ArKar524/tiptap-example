<template>
    <div class="container mx-auto max-w-4xl mt-8 prose">
        <section class="flex flex-wrap p-3 border-t border-r border-l border-gray-400" v-if="editor">
            <button @click="editor.chain().focus().toggleBold().run()"
                :disabled="!editor.can().chain().focus().toggleBold().run()" :class="{ 'bg-gray-200 rounded ml-1': editor.isActive('bold') }
            " class="p-1">
                Bold
            </button>
            <button @click="editor.chain().focus().toggleItalic().run()"
                :disabled="!editor.can().chain().focus().toggleItalic().run()" :class="{ 'bg-gray-200 rounded ml-1': editor.isActive('italic') }
            " class="p-1">
                Italic
            </button>
            <button @click="editor.chain().focus().toggleUnderline().run()"
                :disabled="!editor.can().chain().focus().toggleUnderline().run()" :class="{ 'bg-gray-200 rounded ml-1': editor.isActive('underline') }
            " class="p-1">
                Underline
            </button>
            <button @click="editor.chain().focus().toggleHeading({ level: 1 }).run()"
                :class="{ 'bg-gray-200 rounded ml-1': editor.isActive('heading', { level: 1 }) }" class="p-1">
                h1
            </button>
            <button @click="editor.chain().focus().toggleHeading({ level: 2 }).run()"
                :class="{ 'bg-gray-200 rounded ml-2': editor.isActive('heading', { level: 2 }) }" class="p-1">
                h2
            </button>
            <button @click="editor.chain().focus().toggleBulletList().run()"
                :disabled="!editor.can().chain().focus().toggleBulletList().run()" :class="{ 'bg-gray-200 rounded ml-1': editor.isActive('bulletList') }
            " class="p-1">
                bulletList
            </button>
            <button @click="editor.chain().focus().toggleOrderedList().run()"
                :disabled="!editor.can().chain().focus().toggleOrderedList().run()" :class="{ 'bg-gray-200 rounded ml-1': editor.isActive('oderList') }
            " class="p-1">
                OderList
            </button>
            <button @click="editor.chain().focus().toggleBlockquote().run()"
                :disabled="!editor.can().chain().focus().toggleBlockquote().run()" :class="{ 'bg-gray-200 rounded ml-1': editor.isActive('blockquote') }
            " class="p-1">
                Blockquote
            </button><button @click="editor.chain().focus().toggleCodeBlock().run()"
                :disabled="!editor.can().chain().focus().toggleCodeBlock().run()" :class="{ 'bg-gray-200 rounded ml-1': editor.isActive('codeBlock') }
            " class="p-1">
                CodeBlock
            </button>
            <button @click="editor.chain().focus().setHorizontalRule().run()" :class="{ 'bg-gray-200 rounded ml-1': editor.isActive('horizontalRule') }
            " class="p-1">
                HR
            </button>
            <button @click="editor.chain().focus().undo().run()" :disabled="!editor.can().chain().focus().undo().run()"
                class="p-1 disabled:text-gray-400">
                undo
            </button>
            <button @click="editor.chain().focus().redo().run()" :disabled="!editor.can().chain().focus().redo().run()"
                class="p-1 disabled:text-gray-400">
                redo
            </button>
        </section>
        <editor-content :editor="editor" />
    </div>
</template>
<script setup>
import Underline from '@tiptap/extension-underline'
import Heading from '@tiptap/extension-heading'
import ListItem from '@tiptap/extension-list-item'
import BulletList from '@tiptap/extension-bullet-list'
import CodeBlock from '@tiptap/extension-code-block'
import Blockquote from '@tiptap/extension-blockquote'
import HorizontalRule from '@tiptap/extension-horizontal-rule'



import { useEditor, EditorContent } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'

const editor = useEditor({
    editorProps: {
        attributes: {
            class: 'border border-gray-400 p-4 min-h-[12rem] max-h-[12rem] overflow-y-auto outline-none',
        },
        transformPastedText(text) {
            return text.toUpperCase()
        }
    },
    content: '<p>I’m running Tiptap with Vue.js. 🎉</p>',
    extensions: [
        StarterKit,
        Underline,
        Heading.configure({
            levels: [1, 2, 3],
        }),
        BulletList,
        ListItem,
        CodeBlock,
        HorizontalRule,
        Blockquote,
    ],
})
</script>

<style lang="scss" scoped></style>