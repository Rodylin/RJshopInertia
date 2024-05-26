<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <form @submit.prevent="submit" class="max-w-md mx-auto mt-8 p-6 bg-white rounded-lg shadow-lg">
            <div>
                <InputLabel for="name" value="Name" class="text-gray-700" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full bg-gray-200 border-gray-300 text-gray-800 placeholder-gray-500"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" class="text-gray-700" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full bg-gray-200 border-gray-300 text-gray-800 placeholder-gray-500"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" class="text-gray-700" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full bg-gray-200 border-gray-300 text-gray-800 placeholder-gray-500"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" class="text-gray-700" />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full bg-gray-200 border-gray-300 text-gray-800 placeholder-gray-500"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-6">
                <Link
                    :href="route('login')"
                    class="underline text-sm text-gray-700 hover:text-gray-900 transition duration-300"
                >
                    Already registered?
                </Link>

                <PrimaryButton class="ms-4 bg-gradient-to-r from-purple-500 to-pink-500 text-white hover:from-purple-600 hover:to-pink-600 transition duration-300" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>

<style scoped>
/* Custom styling to match homepage */
.bg-white {
    background-color: #ffffff;
}

.text-gray-700 {
    color: #4a5568;
}

.text-gray-800 {
    color: #2d3748;
}

.placeholder-gray-500::placeholder {
    color: #a0aec0;
}

.hover\:bg-gray-900:hover {
    background-color: #1a202c;
}

.hover\:text-gray-900:hover {
    color: #1a202c;
}
</style>
