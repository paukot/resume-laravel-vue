<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import EditButton from "@/Components/Buttons/EditButton.vue";
import DeleteButton from "@/Components/Buttons/DeleteButton.vue";
import NewButton from "@/Components/Buttons/NewButton.vue";
import InputError from "@/Components/InputError.vue";
import {FloatLabel, InputText, Message} from "primevue";
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Select from "primevue/select";
import {useDebounceFn} from "@vueuse/core"
import {router} from "@inertiajs/vue3";
import {ref, watch} from "vue";

const props = defineProps({
    translations: Object,
    languages: Array,
    types: Array,
    errors: Object,
    status: String,
})

const isLoading = ref(false)
const filters = ref({
    key: {value: null},
    lang: {value: null},
    type: {value: null},
});

const perPage = ref(props.translations.per_page || 20)
const currentPage = ref(props.translations.current_page || 1)
const sortField = ref(props.filters?.sortField || 'id')
const sortOrder = ref(props.filters?.sortOrder || -1)

const fetchData = (page, rows) => {
    isLoading.value = true
    router.get(route('admin.translations.index'), {
        page,
        rows,
        search: filters.value.key.value,
        lang: filters.value.lang.value,
        type: filters.value.type.value,
        order_field: sortField.value,
        order_direction: sortOrder.value === -1 ? 'desc' : 'asc',
    }, {
        preserveState: true,
        preserveScroll: true,
        replace: true,
        onFinish: () => isLoading.value = false
    })
}

const editTranslation = (id) => {
    router.get(route('admin.translations.edit', id));
}

const deleteTranslation = (id) => {
    router.delete(route('admin.translations.destroy', id), {preserveScroll: true});
};

const onPage = (event) => {
    fetchData(event.page + 1, event.rows)
}

const onSort = (event) => {
    sortField.value = event.sortField
    sortOrder.value = event.sortOrder
    fetchData(1, props.translations.per_page)
}

const onFilter = useDebounceFn(() => {
    fetchData(1, props.translations.per_page)
}, 200);

watch(filters, (newVal, oldVal) => onFilter(newVal, oldVal), {deep: true});


</script>

<template>
    <AppLayout title="Translations">
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Translations
                </h2>
                <div>
                    <NewButton :href="route('admin.translations.create')"/>
                </div>
            </div>
        </template>

        <div v-if="status" class="container mx-auto p-2">
            <Message severity="success" :life="3000">{{ status }}</Message>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-600 overflow-hidden sm:rounded-lg shadow-md shadow-gray-800">
                    <div class="overflow-x-auto">
                        <DataTable
                            lazy
                            paginator
                            stripedRows
                            removableSort
                            dataKey="id"
                            tableStyle="min-width: 50rem"
                            :rowsPerPageOptions="[5, 10, 20, 50]"
                            :value="props.translations.data"
                            :rows="perPage"
                            :totalRecords="props.translations.total"
                            :first="(currentPage - 1) * perPage"
                            :sortField="sortField"
                            :sortOrder="sortOrder"
                            :loading="isLoading"
                            @page="onPage"
                            @sort="onSort"
                        >
                            <template #empty> No translations found.</template>
                            <template #loading> Loading translation data. Please wait.</template>

                            <template #header>
                                <div class="flex justify-end gap-1">
                                    <div>
                                        <FloatLabel variant="on" class="max-h-fit">
                                            <label for="input_key_search">Search key</label>
                                            <InputText id="input_key_search"
                                                       v-model="filters.key.value"
                                                       autocomplete="off"
                                            />
                                        </FloatLabel>
                                        <InputError :message="props?.errors.lang" class="mt-2"/>
                                    </div>
                                    <div>
                                        <FloatLabel variant="on" class="max-h-fit">
                                            <Select id="input_type"
                                                    show-clear
                                                    v-model="filters.type.value"
                                                    :options="props.types"
                                                    optionLabel="name"
                                                    optionValue="value"
                                                    input-class="w-full"
                                                    class="w-full md:w-56"
                                            />
                                            <label for="input_type">Select type</label>
                                        </FloatLabel>
                                        <InputError :message="props?.errors.type" class="mt-2"/>
                                    </div>
                                    <div>
                                        <FloatLabel variant="on" class="max-h-fit">
                                            <Select id="input_language"
                                                    show-clear
                                                    v-model="filters.lang.value"
                                                    :options="props.languages"
                                                    optionLabel="name"
                                                    optionValue="value"
                                                    input-class="w-full"
                                                    class="w-full md:w-56"
                                            />
                                            <label for="input_language">Select language</label>
                                        </FloatLabel>
                                        <InputError :message="props?.errors.lang" class="mt-2"/>
                                    </div>
                                </div>
                            </template>

                            <Column field="actions" style="min-width: 8rem" header="Actions">
                                <template #body="{ data }">
                                    <EditButton class="mr-2" :id="data.id" @click="editTranslation(data.id)"/>
                                    <DeleteButton @click="deleteTranslation(data.id)"/>
                                </template>
                            </Column>
                            <Column field="id" sortable header="#"/>
                            <Column field="key" header="Key" sortable>
                                <template #body="{ data }">
                                    <b>{{ data.key }}</b>
                                </template>
                            </Column>
                            <Column field="value" header="Value">
                                <template #body="{ data }">
                                    <div v-html="data.value"></div>
                                </template>
                            </Column>
                            <Column field="position" sortable header="Position"/>
                            <Column field="type" sortable header="Type"/>
                            <Column field="lang" header="Language"/>
                        </DataTable>


                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>

