<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Button from 'primevue/button';
import Tooltip from 'primevue/tooltip';
import EditButton from "@/Components/Buttons/EditButton.vue";
import DeleteButton from "@/Components/Buttons/DeleteButton.vue";

const props = defineProps({
    translations: Object,
});

console.log(props.translations);
</script>

<template>
    <AppLayout title="Translations">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Translations
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y-2 divide-gray-200 dark:divide-gray-700">
                                <thead class="ltr:text-left rtl:text-right">
                                <tr class="*:font-medium *:text-gray-900 dark:*:text-white">
                                    <th class="px-3 py-2 whitespace-nowrap">Actions</th>
                                    <th class="px-3 py-2 whitespace-nowrap">Key</th>
                                    <th class="px-3 py-2 whitespace-nowrap">Value</th>
                                    <th class="px-3 py-2 whitespace-nowrap">Position</th>
                                    <th class="px-3 py-2 whitespace-nowrap">Type</th>
                                    <th class="px-3 py-2 whitespace-nowrap">Language</th>
                                </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 *:even:bg-gray-50 dark:divide-gray-700 dark:*:even:bg-gray-800">

                                <tr class="*:text-gray-900 *:first:font-medium dark:*:text-white"
                                    v-for="translation in translations.data" :key="translations.id">

                                    <td class="px-3 py-2 whitespace-nowrap">
                                        <EditButton :classes="'mr-2'" />
                                        <DeleteButton />
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap">{{ translation?.key }}</td>
                                    <td class="px-3 py-2 whitespace-nowrap">{{ translation.value }}</td>
                                    <td class="px-3 py-2 whitespace-nowrap">{{ translation.position }}</td>
                                    <td class="px-3 py-2 whitespace-nowrap">{{ translation?.type }}</td>
                                    <td class="px-3 py-2 whitespace-nowrap">{{ translation.lang }}</td>
                                </tr>


                                </tbody>
                            </table>
                        </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>
