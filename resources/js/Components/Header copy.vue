<script setup>

import { ref } from 'vue';

const mostrarNotificaciones = ref(false);
const mostrarSearch =ref(false);
const mostrarHelp=ref(false);
const mostrarProfile=ref(false);
const darkMode = ref(false);
import { usePermission } from "@/composables/permissions";
const { hasRole } = usePermission();

const toggleNotificaciones = () => {
    mostrarNotificaciones.value = !mostrarNotificaciones.value;
};
const toggleSearch = () => {
    mostrarSearch.value = !mostrarSearch.value;
};
const toggleHelp = () => {
    mostrarHelp.value = !mostrarHelp.value;
};
const toggleProfile = () => {
    mostrarProfile.value = !mostrarProfile.value;
};

const toggleDarkMode = () => {
    darkMode.value = !darkMode.value;
    document.body.classList.toggle('dark'); // Toggle 'dark' class on <body> for global dark mode
};

</script>

<template>
    <header >
        <div class="sticky top-0  bg-slate-600  z-30">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 -mb-px">
            <div class="flex">
                <button class="text-slate-500 hover:text-slate-600 lg:hidden" aria-controls="sidebar"
                    aria-expanded="false"><span class="sr-only">Open sidebar</span><svg class="w-6 h-6 fill-current"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <rect x="4" y="5" width="16" height="2"></rect>
                        <rect x="4" y="11" width="16" height="2"></rect>
                        <rect x="4" y="17" width="16" height="2"></rect>
                    </svg>
                </button>
            </div>
            <div class="flex items-center space-x-3">
          
                <div  v-if="hasRole('soporte')" class="relative inline-flex">
                    <button @click="toggleNotificaciones"
                        class="w-8 h-8 flex items-center justify-center bg-slate-100 hover:bg-slate-200 dark:bg-slate-700 dark:hover:bg-slate-600/80 rounded-full false"
                        aria-haspopup="true" aria-expanded="false"><span class="sr-only">Notifications</span><svg
                            class="w-4 h-4" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <path class="fill-current text-slate-500 dark:text-slate-400"
                                d="M6.5 0C2.91 0 0 2.462 0 5.5c0 1.075.37 2.074 1 2.922V12l2.699-1.542A7.454 7.454 0 006.5 11c3.59 0 6.5-2.462 6.5-5.5S10.09 0 6.5 0z">
                            </path>
                            <path   class="fill-current text-slate-400 dark:text-slate-500"
                                d="M16 9.5c0-.987-.429-1.897-1.147-2.639C14.124 10.348 10.66 13 6.5 13c-.103 0-.202-.018-.305-.021C7.231 13.617 8.556 14 10 14c.449 0 .886-.04 1.307-.11L15 16v-4h-.012C15.627 11.285 16 10.425 16 9.5z">
                            </path>
                        </svg>
                        <div 
                            class="absolute top-0 right-0 w-2.5 h-2.5 bg-rose-500 border-2 border-white dark:border-[#182235] rounded-full">
                        </div>
                    </button>
                    <div v-show="mostrarNotificaciones" class="origin-top-right z-10 absolute top-full -mr-48 sm:mr-0 min-w-80 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 py-1.5 rounded shadow-lg overflow-hidden mt-1 right-0"
                        >
                        <div>
                            <div
                                class="text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase pt-1.5 pb-2 px-4">
                                Notifications</div>
                            <ul>
                                <li class="border-b border-slate-200 dark:border-slate-700 last:border-0"><a
                                        class="block py-2 px-4 hover:bg-slate-50 dark:hover:bg-slate-700/20"
                                        href="/#0"><span class="block text-sm mb-2">📣 <span
                                                class="font-medium text-slate-800 dark:text-slate-100">Edit your
                                                information in a swipe</span> Sint occaecat cupidatat non proident, sunt
                                            in culpa qui officia deserunt mollit anim.</span><span
                                            class="block text-xs font-medium text-slate-400 dark:text-slate-500">Feb 12,
                                            2021</span></a></li>
                                <li class="border-b border-slate-200 dark:border-slate-700 last:border-0"><a
                                        class="block py-2 px-4 hover:bg-slate-50 dark:hover:bg-slate-700/20"
                                        href="/#0"><span class="block text-sm mb-2">📣 <span
                                                class="font-medium text-slate-800 dark:text-slate-100">Edit your
                                                information in a swipe</span> Sint occaecat cupidatat non proident, sunt
                                            in culpa qui officia deserunt mollit anim.</span><span
                                            class="block text-xs font-medium text-slate-400 dark:text-slate-500">Feb 9,
                                            2021</span></a></li>
                                <li class="border-b border-slate-200 dark:border-slate-700 last:border-0"><a
                                        class="block py-2 px-4 hover:bg-slate-50 dark:hover:bg-slate-700/20"
                                        href="/#0"><span class="block text-sm mb-2">🚀<span
                                                class="font-medium text-slate-800 dark:text-slate-100">Say goodbye to
                                                paper receipts!</span> Sint occaecat cupidatat non proident, sunt in
                                            culpa qui officia deserunt mollit anim.</span><span
                                            class="block text-xs font-medium text-slate-400 dark:text-slate-500">Jan 24,
                                            2020</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
               <!--  -->
                <!--  -->
               
                <div class="relative inline-flex">
                    <button @click="toggleHelp"
                        class="w-8 h-8 flex items-center justify-center bg-slate-100 hover:bg-slate-200 dark:bg-slate-700 dark:hover:bg-slate-600/80 rounded-full false"
                        aria-haspopup="true" aria-expanded="false"><span class="sr-only">Need help?</span><svg
                            class="w-4 h-4" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <path class="fill-current text-slate-500 dark:text-slate-400"
                                d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z">
                            </path>
                        </svg>
                    </button>
                    <div  v-show="mostrarHelp"  class="origin-top-right z-10 absolute top-full min-w-44 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 py-1.5 rounded shadow-lg overflow-hidden mt-1 right-0"
                        >
                        <div>
                            <div
                                class="text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase pt-1.5 pb-2 px-3">
                                Need help?</div>
                            <ul>
                                <li><a class="font-medium text-sm text-indigo-500 hover:text-indigo-600 dark:hover:text-indigo-400 flex items-center py-1 px-3"
                                        href="/#0"><svg
                                            class="w-3 h-3 fill-current text-indigo-300 dark:text-indigo-500 shrink-0 mr-2"
                                            viewBox="0 0 12 12">
                                            <rect y="3" width="12" height="9" rx="1"></rect>
                                            <path d="M2 0h8v2H2z"></path>
                                        </svg><span>Documentation</span></a></li>
                                <li><a class="font-medium text-sm text-indigo-500 hover:text-indigo-600 dark:hover:text-indigo-400 flex items-center py-1 px-3"
                                        href="/#0"><svg
                                            class="w-3 h-3 fill-current text-indigo-300 dark:text-indigo-500 shrink-0 mr-2"
                                            viewBox="0 0 12 12">
                                            <path
                                                d="M10.5 0h-9A1.5 1.5 0 000 1.5v9A1.5 1.5 0 001.5 12h9a1.5 1.5 0 001.5-1.5v-9A1.5 1.5 0 0010.5 0zM10 7L8.207 5.207l-3 3-1.414-1.414 3-3L5 2h5v5z">
                                            </path>
                                        </svg><span>Support Site</span></a></li>
                                <li><a class="font-medium text-sm text-indigo-500 hover:text-indigo-600 dark:hover:text-indigo-400 flex items-center py-1 px-3"
                                        href="/#0"><svg
                                            class="w-3 h-3 fill-current text-indigo-300 dark:text-indigo-500 shrink-0 mr-2"
                                            viewBox="0 0 12 12">
                                            <path
                                                d="M11.854.146a.5.5 0 00-.525-.116l-11 4a.5.5 0 00-.015.934l4.8 1.921 1.921 4.8A.5.5 0 007.5 12h.008a.5.5 0 00.462-.329l4-11a.5.5 0 00-.116-.525z">
                                            </path>
                                        </svg><span>Contact us</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                            <input @click="toggleDarkMode" type="checkbox" name="light-switch" id="light-switch" class="light-switch sr-only"
                                   v-model="darkMode">
                            <label
                                class="flex items-center justify-center cursor-pointer w-8 h-8 bg-slate-100 hover:bg-slate-200 dark:bg-slate-700 dark:hover:bg-slate-600/80 rounded-full"
                                for="light-switch">
                                <svg v-if="darkMode" class="w-4 h-4 " width="16" height="16"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path class="fill-current text-dark-400"
                                          d="M7 0h2v2H7V0Zm5.88 1.637 1.414 1.415-1.415 1.413-1.414-1.414 1.415-1.414ZM14 7h2v2h-2V7Zm-1.05 7.433-1.415-1.414 1.414-1.414 1.415 1.413-1.414 1.415ZM7 14h2v2H7v-2Zm-4.02.363L1.566 12.95l1.415-1.414 1.414 1.415-1.415 1.413ZM0 7h2v2H0V7Zm3.05-5.293L4.465 3.12 3.05 4.535 1.636 3.121 3.05 1.707Z">
                                    </path>
                                    <path class="fill-current text-dark-500"
                                          d="M8 4C5.8 4 4 5.8 4 8s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4Z"></path>
                                </svg>
                                <svg v-if="!darkMode" class="w-4 h-4" width="16" height="16"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path class="fill-current text-dark-400"
                                          d="M6.2 2C3.2 2.8 1 5.6 1 8.9 1 12.8 4.2 16 8.1 16c3.3 0 6-2.2 6.9-5.2C9.7 12.2 4.8 7.3 6.2 2Z">
                                    </path>
                                    <path class="fill-current text-dark-500"
                                          d="M12.5 6a.625.625 0 0 1-.625-.625 1.252 1.252 0 0 0-1.25-1.25.625.625 0 1 1 0-1.25 1.252 1.252 0 0 0 1.25-1.25.625.625 0 1 1 1.25 0c.001.69.56 1.249 1.25 1.25a.625.625 0 1 1 0 1.25c-.69.001-1.249.56-1.25 1.25A.625.625 0 0 1 12.5 6Z">
                                    </path>
                                </svg> 
                                <span class="sr-only">Switch to light / dark version</span>
                            </label>
                </div>
                <hr class="w-px h-6 bg-slate-200 dark:bg-slate-700 border-none">
                <div class="relative inline-flex">
                    <button @click="toggleProfile" class="inline-flex justify-center items-center group"
                        aria-haspopup="true" aria-expanded="false"><img class="w-8 h-8 rounded-full"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAIAAAAlC+aJAAAD/ElEQVR4Ae2axXorRxCFq+by3VyT2NkENTecrC4zMz5A3sIw3mUXfoLQNsywCTOzMSiIhWZ7ZrpSU25NmGFGX/p8UneV8Pzq023E63edg3aWBVHIABgAA2AADIABMAAGwAAYAANw9VU39HTbbQzgurNbNvdv2zKQ6LHbEqBYfAsBerrz27b0b98mGO0FUG+MLi42AJFrdr9je//OHYPJhN1Om7hQehuImCEYAZOJ/M4dA7t2DqaSdnsAFEtvE0+BeQwmaVLJ/O5dA3v2CEbMASqVjzxvQawHEAKCXLJSCXvvnoF9+5x0yo4vgFJe+dv3CMQ4sAQkkCwIYipx2b59gwcOCEYMAeQselPME0tAQNTaGNJzqA4eHDx4yMmk7dgBlMvvKd+TJcBl51oUVrpIJ/OHDg0ePuxkMnaMAFxvfrL6MZBsgnA/i3QlM2kezKTzR444R486WcGIGkBUKLzV8qgllUzCxQPKLuFeWuJFOHp08NhxJ5u1owcold5CvY918kH6oAmF4UCo78dcxj5xwuFLLmdHCTC/0KjVRmUF9L5FSZNuxDFJp4VIROHj2f3Jk0OnTju9ghEBAKtQfDtcAVG4CsGgG11ryp88PpfdyAxnzg719m6MAqDwpvgKP2nkWawShkAo+QlZfunxuWz+7Fnn7PmhC/4Yxkr4h6SIFmZ5EPlKEciVS1KuxyVXvk++y6PyPd/3lL64ynU9Hj3X95Y8d8lnGG/F1wsrp8H6DwHSqesBqJVsZCJEUhRwoGUBIykgkHv0GMzyYFkTIrmbrX+zsPJFz/oKRP8dQCp5HeiDkidFSodFWEhnXbWSREIgt+IyE+IifDFjPb+04ssINvHaNR2dnRcF7nTukaVDjhZpKtAi7Tx8+IL/RWXprpq6dwm/d/+frkA6dR0p0oenUmISpBNJQlQAoS+Ss4Bj1p2oTD87701AqIgArkcLKYi5nJhIIsGAAAmxFSENB7OL46Xa07NL4yCKEmDVynXdnbYEwyImQFRilIH0kW9ZchgBWgA+TM+PFSaf4BFE0QMkE1ezRUAdaH2qy74Ux0ra4NqcHv2q9PjU7Gi8vp1OZ663GACAlAq//xEICb5lcd+YHvlo5PaPxu7Q7uMDYFkrE91XinVAxiC9AgIRDI2p4Xc+vvm9T29tzIzAzxV5hHq6L1+1ar18/CTBRzn1iYHqzeHRiYfqzc8gVOwA5ADFIOcKEclXgMCqNYdHxh6sNbT1WANkUtcSkYW4nKdK7dOR0Qeq9U9BFHeAjo6LV6/pANFk9dOR4ftD620BIN/AIVYqnwyP3F+taevtBLB69fpXXrmxItajkvl/IQNgAAyAATAABsAAGAADYAD+vwDfAQSHHlNp5b1mAAAAAElFTkSuQmCC"
                            width="32" height="32" alt="User">
                        <div class="flex items-center truncate"><span
                                class="truncate ml-2 text-sm font-medium dark:text-slate-300 group-hover:text-slate-800 dark:group-hover:text-slate-200">Acme
                                Inc.</span><svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"
                                viewBox="0 0 12 12">
                                <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                            </svg></div>
                    </button>
                    <div v-show="mostrarProfile" class="origin-top-right z-10 absolute top-full min-w-44 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 py-1.5 rounded shadow-lg overflow-hidden mt-1 right-0"
                        >
                        <div>
                            <div class="pt-0.5 pb-2 px-3 mb-1 border-b border-slate-200 dark:border-slate-700">
                                <div class="font-medium text-slate-800 dark:text-slate-100">Acme Inc.</div>
                                <div class="text-xs text-slate-500 dark:text-slate-400 italic">Administrator</div>
                            </div>
                            <ul>
                                <li><a class="font-medium text-sm text-indigo-500 hover:text-indigo-600 dark:hover:text-indigo-400 flex items-center py-1 px-3"
                                        href="/settings">Settings</a></li>
                                <li><a class="font-medium text-sm text-indigo-500 hover:text-indigo-600 dark:hover:text-indigo-400 flex items-center py-1 px-3"
                                        href="/logout">Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </header>
</template>


<style scoped>
    Estilos específicos para el modo oscuro
    .dark {
        --bg-color: #182235;
        --border-color: #1a202c;
        --text-color: #e2e8f0;
        --accent-color: #4c51bf;
    }

    .dark .bg-white {
        background-color: var(--bg-color);
    }

    .dark .border-slate-200 {
        border-color: var(--border-color);
    }

    .dark .text-slate-500 {
        color: var(--text-color);
    }

    .dark .hover\:text-slate-600:hover {
        color: var(--text-color);
    }

    .dark .bg-slate-100 {
        background-color: var(--border-color);
    }

    .dark .hover\:bg-slate-200:hover {
        background-color: var(--border-color);
    }

    /* Agrega más estilos según sea necesario */
</style>