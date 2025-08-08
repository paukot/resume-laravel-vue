<script setup lang="ts">
import Button from "primevue/button";

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
        default: 'Delete',
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
</script>

<template>
    <Button :class="props.classes" label="Danger" severity="danger" :size="props.buttonSize" raised
            as="a"
            v-tooltip="tooltipText" :placeholder="props.placing"
    >
        <i class="pi pi pi-trash" :style="'font-size: ' + props.iconSize"></i>
    </Button>
</template>
