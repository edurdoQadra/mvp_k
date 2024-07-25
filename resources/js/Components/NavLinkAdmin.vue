<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps(['href', 'active']);

const classes = computed(() =>
    props.active
        ? 'inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring-2 focus:ring-indigo-500 dark:bg-indigo-700 dark:hover:bg-indigo-800 dark:focus:border-indigo-800 dark:focus:ring-indigo-500 transition duration-150 ease-in-out'
        : 'inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 dark:text-gray-300 dark:bg-gray-700 dark:hover:bg-gray-800 dark:focus:border-gray-800 dark:focus:ring-gray-500 hover:bg-gray-100 focus:outline-none focus:border-gray-300 focus:ring-2 focus:ring-gray-500 transition duration-150 ease-in-out'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
