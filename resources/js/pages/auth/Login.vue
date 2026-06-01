<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';
import InputError from '@/components/InputError.vue';
import PasswordInput from '@/components/PasswordInput.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import { store } from '@/routes/login';
import { request } from '@/routes/password';

defineOptions({
    layout: {
        title: 'Login - Davina Event',
        description: 'Masuk ke akun admin Anda',
    },
});

defineProps<{
    status?: string;
    canResetPassword: boolean;
}>();
</script>

<template>
    <Head title="Log in" />

    <div
        v-if="status"
        class="mb-4 text-center text-sm font-medium text-green-600"
    >
        {{ status }}
    </div>

    <Form
        v-bind="store.form()"
        :reset-on-success="['password']"
        v-slot="{ errors, processing }"
        class="bg-white rounded-lg shadow-md p-6"
    >
        <div class="grid gap-6">
            <div class="mb-6">
                <Label for="email" class="block text-sm font-medium text-gray-900 mb-2">Email</Label>
                <Input
                    id="email"
                    type="email"
                    name="email"
                    required
                    autofocus
                    :tabindex="1"
                    autocomplete="email"
                    placeholder="admin@davinaevent.com"
                />
                <InputError :message="errors.email" />
            </div>

            <div class="mb-6">
                <div class="flex items-center justify-between mb-2">
                    <Label for="password" class="block text-sm font-medium text-gray-900">Kata Sandi</Label>
                    <TextLink
                        v-if="canResetPassword"
                        :href="request()"
                        class="text-sm font-medium text-gray-900 hover:underline"
                        :tabindex="5"
                    >
                        Lupa kata sandi?
                    </TextLink>
                </div>
                <PasswordInput
                    id="password"
                    name="password"
                    required
                    :tabindex="2"
                    autocomplete="current-password"
                    placeholder="Masukkan kata sandi"
                />
                <InputError :message="errors.password" />
            </div>

            <div class="mb-6 flex items-center">
                <Label for="remember" class="flex items-center gap-2">
                    <Checkbox id="remember" name="remember" :tabindex="3" />
                    <span class="text-sm font-medium text-gray-900">Ingat saya</span>
                </Label>
            </div>

            <Button
                type="submit"
                class="w-full bg-black text-white hover:bg-gray-800 py-2 font-medium rounded-lg"
                :tabindex="4"
                :disabled="processing"
                data-test="login-button"
            >
                <Spinner v-if="processing" />
                Masuk
            </Button>
        </div>
    </Form>
</template>
