<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('background')?.classList.add('hidden');
}
</script>

<template>
    <Head title="Welcome to ShopEase" />
    <div class="relative min-h-screen bg-white text-gray-800">
        <img
            id="background"
            class="absolute inset-0 w-full h-full object-cover z-0 opacity-20"
            src="../Components/mall.avif"
            @error="handleImageError"
            alt="Shopping Background"
        />
        <div class="relative flex flex-col items-center justify-center min-h-screen p-6">
            <div class="relative w-full max-w-5xl text-center">
                <header class="py-10">
                    <h1 class="text-5xl text-blue-700 font-bold">Welcome to RJshop</h1>
                    <p class="mt-4 text-lg text-gray-600">Your ultimate destination for the best shopping experience.</p>
                </header>

                <main class="mt-16">
                    <h2 class="text-3xl text-gray-700 font-semibold p-6 m-auto rounded-2xl shadow-lg transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105 bg-gray-100">
                        Discover, Shop, and Enjoy!
                    </h2>

                    <Link 
                        href="/login"
                        class="mt-8 inline-block rounded-md bg-gradient-to-r from-purple-500 to-pink-500 px-6 py-3 text-white font-semibold shadow-lg transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105 focus:outline-none focus-visible:ring-2 focus-visible:ring-white"
                    >
                        Get Started
                    </Link>
                </main>

                <footer class="mt-16 flex justify-center gap-4">
                    <template v-if="canLogin">
                        <template v-if="$page.props.auth.user">
                            <Link
                                :href="route('dashboard')"
                                class="rounded-md px-4 py-2 bg-blue-600 text-white shadow-lg focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-400"
                            >
                                Dashboard
                            </Link>
                        </template>

                        <template v-else>
                            <div class="flex gap-4">
                                <Link
                                    :href="route('login')"
                                    class="rounded-md px-4 py-2 bg-green-600 text-white shadow-lg hover:bg-green-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-green-400"
                                >
                                    Log in
                                </Link>

                                <Link
                                    v-if="canRegister"
                                    :href="route('register')"
                                    class="rounded-md px-4 py-2 bg-yellow-600 text-white shadow-lg hover:bg-yellow-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-yellow-400"
                                >
                                    Register
                                </Link>
                            </div>
                        </template>
                    </template>
                </footer>
            </div>
        </div>
    </div>
</template>

<style scoped>
#background {
    filter: brightness(0.9);
}

header h1 {
    text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
}

main h2 {
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
}

main h2:hover {
    transform: translateY(-5px);
}

footer a {
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}
</style>
