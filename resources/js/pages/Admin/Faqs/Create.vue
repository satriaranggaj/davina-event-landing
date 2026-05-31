<template>
  <div>
    <div class="mb-6">
      <h2 class="text-xl font-semibold text-gray-900 mb-4">Tambah FAQ</h2>
    </div>

    <form @submit.prevent="submitForm" class="max-w-2xl bg-white rounded-lg shadow p-6">
      <div class="mb-6">
        <label class="block text-sm font-medium text-gray-900 mb-2">Pertanyaan</label>
        <input
          v-model="form.question"
          type="text"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
          placeholder="Masukkan pertanyaan"
        />
      </div>

      <div class="mb-6">
        <label class="block text-sm font-medium text-gray-900 mb-2">Jawaban</label>
        <textarea
          v-model="form.answer"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
          rows="6"
          placeholder="Masukkan jawaban lengkap"
        ></textarea>
      </div>

      <div class="mb-6">
        <label class="block text-sm font-medium text-gray-900 mb-2">Kategori</label>
        <input
          v-model="form.category"
          type="text"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
          placeholder="Umum, Layanan, Pembayaran, dll"
        />
      </div>

      <div class="mb-6">
        <label class="flex items-center gap-2">
          <input v-model="form.active" type="checkbox" class="rounded" />
          <span class="text-sm font-medium text-gray-900">Aktif</span>
        </label>
      </div>

      <div class="flex gap-3">
        <button
          type="submit"
          class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-800 transition font-medium"
        >
          Simpan
        </button>
        <Link
          href="/admin/faqs"
          class="bg-gray-300 text-gray-900 px-6 py-2 rounded-lg hover:bg-gray-400 transition font-medium"
        >
          Batal
        </Link>
      </div>
    </form>
  </div>
</template>

<script setup lang="ts">
import { reactive } from 'vue';
import { Link, router } from '@inertiajs/vue3';import AdminLayout from '@/layouts/AdminLayout.vue';

defineOptions({
    layout: AdminLayout,
});
const form = reactive({
  question: '',
  answer: '',
  category: '',
  active: true,
  sort_order: 0,
});

const submitForm = () => {
  router.post('/admin/faqs', form);
};
</script>
