<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>


<template>
    <div>
        <div class="min-h-screen bg-green-100">
            <nav class="bg-green-200 border-b border-orange-300">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
                    <div class="shrink-0">
                        <Link :href="route('dashboard')">
                            <h1 class="text-orange-500 text-3xl">RJShop</h1>
                        </Link>
                    </div>

                    <div class="flex-grow flex justify-center space-x-8">
                        <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Home
                        </NavLink>
                        <NavLink :href="route('book')" :active="route().current('book')">
                            Products
                        </NavLink>
                        <NavLink :href="route('schedule')" :active="route().current('schedule')">
                            Categories
                        </NavLink>
                        <NavLink :href="route('about')" :active="route().current('about')">
                            About Us
                        </NavLink>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <div class="ms-3 relative">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <span class="inline-flex rounded-md">
                                        <button
                                            type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-800 bg-green-300 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                        >
                                            {{ $page.props.auth.user.name }}
                                            <svg
                                                class="ms-2 -me-0.5 h-4 w-4"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                        </button>
                                    </span>
                                </template>

                                <template #content>
                                    <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                                    <DropdownLink :href="route('logout')" method="post" as="button">
                                        Log Out
                                    </DropdownLink>
                                </template>
                            </Dropdown>
                        </div>
                    </div>

                    <div class="-me-2 flex items-center sm:hidden">
                        <button
                            @click="showingNavigationDropdown = !showingNavigationDropdown"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-800 hover:text-gray-700 hover:bg-green-300 focus:outline-none focus:bg-green-300 focus:text-gray-700 transition duration-150 ease-in-out"
                        >
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path
                                    :class="{
                                        hidden: showingNavigationDropdown,
                                        'inline-flex': !showingNavigationDropdown,
                                    }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                                <path
                                    :class="{
                                        hidden: !showingNavigationDropdown,
                                        'inline-flex': showingNavigationDropdown,
                                    }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>
                </div>

                <div
                    :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
                    class="sm:hidden"
                >
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Home
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('book')" :active="route().current('book')">
                            Products
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('schedule')" :active="route().current('schedule')">
                            Categories
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('about')" :active="route().current('about')">
                            About Us
                        </ResponsiveNavLink>
                    </div>

                    <div class="pt-4 pb-1 border-t border-green-300">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800">
                                {{ $page.props.auth.user.name }}
                            </div>
                            <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.edit')"> Profile </ResponsiveNavLink>
                            <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <header class="bg-green-300 shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <main>
                <slot />
            </main>
        </div>
    </div>
</template>


<style scoped>
h1 {
    font-size: 2.5rem;
    font-weight: bold;
    color: #ffa500; /* Adjust the shade of orange if necessary */
}

.nav-link, .responsive-nav-link {
    color: #4a5568;
    transition: color 0.3s ease-in-out;
}

.nav-link:hover, .responsive-nav-link:hover {
    color: #2d3748;
}

.nav-link.active, .responsive-nav-link.active {
    color: #2d3748;
    font-weight: bold;
}

.text-gray-800 {
    color: #2d3748;
}

.text-gray-500 {
    color: #6b7280;
}
</style>
