<script setup lang="ts">
import Button from "primevue/button";
import {router} from "@inertiajs/vue3";

const props = defineProps({
    href: {
        type: String,
        default: '#',
    },
    buttonSize: {
        type: String,
        default: 'small',
    },
    tooltipText: {
        type: String,
        default: 'New',
    },
    classes: {
        type: String,
        default: '',
    },
    placing: {
        type: String,
        default: 'Top',
    },
    iconSize: {
        type: String,
        default: '1.25rem',
    },
})

const visitSite = (link: string) => {
    return router.visit(link);
}

</script>

<template>
    <Button :class="props.classes" label="Success" severity="success" :size="props.buttonSize" raised
            @click="visitSite(props.href)"
            v-tooltip="tooltipText" :placeholder="props.placing"
    >
        <i class="pi pi-plus" :style="'font-size: ' + props.iconSize"></i>
    </Button>
</template>
