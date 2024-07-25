<script setup>
import {ref} from 'vue'
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/vue3";
import { usePermission } from "@/composables/permissions";


const showingNavigationDropdown = ref(false);
const { hasRole } = usePermission();


</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">         

            <!-- Page Heading -->
            <!-- <header
                class="bg-white dark:bg-gray-800 shadow"
                v-if="$slots.header"
            >
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header> -->

            <!-- Page Content -->
            <main>          
                <slot />
            </main>
        </div>
    </div>
</template>
