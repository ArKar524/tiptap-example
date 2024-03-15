<template>
    <Label for="content" class="text-xl">Content</Label>
    <section
        class="flex flex-wrap  px-4 py-3 border-t text-gray-600 border-r rounded-b-none border-l rounded border-gray-400"
        v-if="editor">
        <button type="button" @click="editor.chain().focus().toggleBold().run()"
            :disabled="!editor.can().chain().focus().toggleBold().run()" :class="{ 'bg-gray-400 rounded ml-1': editor.isActive('bold') }
            " class="p-1">
            <BoldIcon />
        </button>
        <button type="button" @click="editor.chain().focus().toggleItalic().run()"
            :disabled="!editor.can().chain().focus().toggleItalic().run()" :class="{ 'bg-gray-400 rounded ml-1': editor.isActive('italic') }
            " class="p-1">
            <ItalicIcon />
        </button>
        <button type="button" @click="editor.chain().focus().toggleUnderline().run()"
            :disabled="!editor.can().chain().focus().toggleUnderline().run()" :class="{ 'bg-gray-400 rounded ml-1': editor.isActive('underline') }
            " class="p-1">
            <UnderlineIcon />
        </button>
        <button type="button" @click="editor.chain().focus().toggleHeading({ level: 1 }).run()"
            :class="{ 'bg-gray-400 rounded ml-1': editor.isActive('heading', { level: 1 }) }" class="p-1">
            <Header1Icon />
        </button>
        <button type="button" @click="editor.chain().focus().toggleHeading({ level: 2 }).run()"
            :class="{ 'bg-gray-400 rounded ml-2': editor.isActive('heading', { level: 2 }) }" class="p-1">
            <Header2Icon />
        </button>
        <button type="button" @click="editor.chain().focus().toggleBulletList().run()"
            :disabled="!editor.can().chain().focus().toggleBulletList().run()" :class="{ 'bg-gray-400 rounded ml-1': editor.isActive('bulletList') }
            " class="p-1">
            <BulletListIcon />
        </button>
        <button type="button" @click="editor.chain().focus().toggleOrderedList().run()"
            :disabled="!editor.can().chain().focus().toggleOrderedList().run()" :class="{ 'bg-gray-400 rounded ml-1': editor.isActive('oderList') }
            " class="p-1">
            <ListNumberedIcon />
        </button>
        <button type="button" @click="editor.chain().focus().toggleBlockquote().run()"
            :disabled="!editor.can().chain().focus().toggleBlockquote().run()" :class="{ 'bg-gray-400 rounded ml-1': editor.isActive('blockquote') }
            " class="p-1">
            <QuoteCloseIcon />
        </button>
        <button type="button" @click="editor.chain().focus().toggleCodeBlock().run()"
            :disabled="!editor.can().chain().focus().toggleCodeBlock().run()" :class="{ 'bg-gray-400 rounded ml-1': editor.isActive('codeBlock') }
            " class="p-1">
            <CodeTags />
        </button>
        <button type="button" @click="editor.chain().focus().setHorizontalRule().run()" :class="{ 'bg-gray-400 rounded ml-1': editor.isActive('horizontalRule') }
            " class="p-1">
            <HorizontalRuleIcon />
        </button>
        <button type="button" @click="editor.chain().focus().undo().run()"
            :disabled="!editor.can().chain().focus().undo().run()" class="p-1 disabled:text-gray-400">
            <UndoIcon />
        </button>
        <button type="button" @click="editor.chain().focus().redo().run()"
            :disabled="!editor.can().chain().focus().redo().run()" class="p-1  disabled:text-gray-400">
            <RedoIcon />
        </button>
    </section>
    <EditorContent :editor="editor" />
</template>
<script setup>
import { useEditor, EditorContent } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'
import { defineEmits, watch } from 'vue';

import Underline from '@tiptap/extension-underline'
import Heading from '@tiptap/extension-heading'
import ListItem from '@tiptap/extension-list-item'
import BulletList from '@tiptap/extension-bullet-list'
import CodeBlock from '@tiptap/extension-code-block'
import Blockquote from '@tiptap/extension-blockquote'
import HorizontalRule from '@tiptap/extension-horizontal-rule'
import Image from '@tiptap/extension-image'
import BoldIcon from 'vue-material-design-icons/FormatBold.vue';
import ItalicIcon from 'vue-material-design-icons/FormatItalic.vue';
import UnderlineIcon from 'vue-material-design-icons/FormatUnderline.vue';
import Header1Icon from 'vue-material-design-icons/FormatHeader1.vue';
import Header2Icon from 'vue-material-design-icons/FormatHeader2.vue';
import BulletListIcon from 'vue-material-design-icons/FormatListBulleted.vue';
import ListNumberedIcon from 'vue-material-design-icons/FormatListNumbered.vue';
import QuoteCloseIcon from 'vue-material-design-icons/FormatQuoteClose.vue';
import CodeTags from 'vue-material-design-icons/CodeTags.vue';
import HorizontalRuleIcon from 'vue-material-design-icons/Minus.vue';
import UndoIcon from 'vue-material-design-icons/Undo.vue';
import RedoIcon from 'vue-material-design-icons/Redo.vue';
// ================================================================



const props = defineProps({
    modelValue: String,
})

const emit = defineEmits(['update:modelValue'])

const editor = useEditor({
    content: props.modelValue,
    onUpdate: ({ editor }) => {
        const content = editor.getHTML();
        console.log(content);
        emit('update:modelValue', content);
    },
    editorProps: {
        attributes: {
            class: 'border border-gray-400 rounded rounded-t-none  p-4 min-h-[12rem] max-h-[12rem] overflow-y-auto outline-none',
        },
        transformPastedText(text) {
            return text.toUpperCase()
        }
    },
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