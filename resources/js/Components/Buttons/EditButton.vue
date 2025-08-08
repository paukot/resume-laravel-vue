<script setup lang="ts">
import Button from "primevue/button";

const props = defineProps({
    buttonSize: {
        type: String,
        default: 'small',
    },
    tooltipText: {
        type: String,
        default: 'Edit',
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
    <Button :class="props.classes" label="Warn" severity="warn" :size="props.buttonSize" raised
            v-tooltip="tooltipText" :placeholder="props.placing"
    >
        <i class="pi pi-pen-to-square" :style="'font-size: ' + props.iconSize"></i>
    </Button>
</template>
