<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import NewButton from "@/Components/Buttons/NewButton.vue";
import TranslationForm from "@/Pages/Translation/Partials/TranslationForm.vue";

const props = defineProps({
    translation: Object,
    types: Array,
    languages: Array,
});

</script>

<template>
    <AppLayout title="Translations">
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Edit Translation
                </h2>
                <div>
                    <NewButton/>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <TranslationForm :translation="translation" :types="types" :languages="languages"/>
            </div>
        </div>
    </AppLayout>
</template>
