<script setup lang="ts">
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import ActionMessage from "@/Components/ActionMessage.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {useForm} from "@inertiajs/vue3";
import Editor from 'primevue/editor';
import Select from 'primevue/select';
import {defineProps} from "vue";
import {route} from "ziggy-js";

const props = defineProps({
    translation: Object,
    languages: Array,
    types: Array,
})

const form = useForm({
    _method: props.translation?.id ? 'PUT' : 'POST',
    lang: props.translation?.lang,
    type: props.translation?.type,
    position: props.translation?.position ?? 0,
    key: props.translation?.key,
    value: props.translation?.value,
});

const storeTranslation = () => {
    if (props.translation) {
        form.put(route('admin.translations.update', props.translation.id), {errorBag: 'translation',});
    } else {
        form.post(route('admin.translations.store'), {errorBag: 'translation',});
    }
}

</script>

<template>
    <FormSection @submitted="storeTranslation()">
        <template #title>
            Translation Form
        </template>

        <!--        <template #description></template>-->

        <template #form>

            <!--            Language        -->
            <div class="col-span-5 sm:col-span-3">
                <InputLabel for="lang" value="Language" class="mb-1"/>
                <Select v-model="form.lang"
                        fluid
                        :options="props.languages" optionLabel="name" optionValue="value"
                        placeholder="Select Language" class="w-full md:w-56"/>
                <InputError :message="form.errors.lang" class="mt-2"/>
            </div>

            <!--            Type            -->
            <div class="col-span-5 sm:col-span-3">
                <InputLabel for="type" value="Type" class="mb-1"/>
                <Select v-model="form.type"
                        fluid
                        editable
                        :options="props.types" optionLabel="name" optionValue="value"
                        input-class="w-full"
                        placeholder="Select Type" class="w-full md:w-56"/>
                <InputError :message="form.errors.type" class="mt-2"/>
            </div>

            <!--            Key            -->
            <div class="col-span-5 sm:col-span-3">
                <InputLabel for="key" value="Key"/>
                <TextInput
                    id="key"
                    v-model="form.key"
                    type="text"
                    class="mt-1 block w-full"
                    required
                />
                <InputError :message="form.errors.key" class="mt-2"/>
            </div>

            <!--            Position            -->
            <div class="col-span-5 sm:col-span-3">
                <InputLabel for="position" value="Position"/>
                <TextInput
                    id="position"
                    v-model="form.position"
                    type="number"
                    min="0"
                    max="1000"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.position" class="mt-2"/>
            </div>

            <!--            Value       -->
            <div class="col-span-5 sm:col-span-6">
                <InputLabel for="value" value="Value" class="mb-1"/>

                <Editor v-model="form.value" editorStyle="height: 320px"/>

                <InputError :message="form.errors.lang" class="mt-2"/>
            </div>

        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="me-3">
                Saved.
            </ActionMessage>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </PrimaryButton>
        </template>

    </FormSection>
</template>

<style scoped>

</style>
