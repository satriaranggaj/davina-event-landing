<template>
  <div class="space-y-6">
    <div class="mb-6">
      <h2 class="text-xl font-semibold text-gray-900">Pengaturan Informasi Bisnis</h2>
    </div>

    <form @submit.prevent="submitForm" class="bg-white rounded-lg shadow p-6 space-y-6">
      <!-- Business Information Section -->
      <div class="border-b border-gray-200 pb-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Bisnis</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-medium text-gray-900 mb-2">Nama Bisnis</label>
            <input
              v-model="form.business_name"
              type="text"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
              placeholder="Nama bisnis Anda"
            />
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-900 mb-2">Layanan</label>
            <input
              v-model="form.service"
              type="text"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
              placeholder="Deskripsi singkat layanan"
            />
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-900 mb-2">Nama Pemilik</label>
            <input
              v-model="form.owner_name"
              type="text"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
              placeholder="Nama pemilik/pengelola"
            />
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-900 mb-2">Email</label>
            <input
              v-model="form.email"
              type="email"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
              placeholder="email@example.com"
            />
          </div>
        </div>
      </div>

      <!-- Contact Information Section -->
      <div class="border-b border-gray-200 pb-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Kontak</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-medium text-gray-900 mb-2">Nomor Telepon</label>
            <input
              v-model="form.phone"
              type="tel"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
              placeholder="+62 8123456789"
            />
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-900 mb-2">Nomor WhatsApp</label>
            <input
              v-model="form.whatsapp_number"
              type="tel"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
              placeholder="+62 8123456789"
            />
          </div>
        </div>
      </div>

      <!-- Social Media Section -->
      <div class="border-b border-gray-200 pb-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Media Sosial</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-medium text-gray-900 mb-2">Instagram</label>
            <input
              v-model="form.instagram"
              type="url"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
              placeholder="https://instagram.com/username"
            />
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-900 mb-2">TikTok</label>
            <input
              v-model="form.tiktok"
              type="url"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
              placeholder="https://tiktok.com/@username"
            />
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-900 mb-2">Facebook</label>
            <input
              v-model="form.facebook"
              type="url"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
              placeholder="https://facebook.com/username"
            />
          </div>
        </div>
      </div>

      <!-- Bank Information Section -->
      <div class="border-b border-gray-200 pb-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Bank (untuk Invoice)</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-medium text-gray-900 mb-2">Nama Bank</label>
            <input
              v-model="form.owner_bank_name"
              type="text"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
              placeholder="contoh: BCA, Mandiri, BNI"
            />
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-900 mb-2">Nomor Rekening</label>
            <input
              v-model="form.owner_bank_account"
              type="text"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
              placeholder="1234567890"
            />
          </div>
        </div>
      </div>

      <!-- Location Information Section -->
      <div>
        <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Lokasi</h3>

        <div class="space-y-6">
          <div>
            <label class="block text-sm font-medium text-gray-900 mb-2">Link Lokasi (Google Maps, dll)</label>
            <input
              v-model="form.location_link"
              type="url"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
              placeholder="https://maps.google.com/..."
            />
            <p class="text-gray-500 text-xs mt-1">Link untuk membuka lokasi di peta (Google Maps, Apple Maps, dll)</p>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-900 mb-2">Kode Embed Map</label>
            <textarea
              v-model="form.map_embed_code"
              rows="6"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900 font-mono text-sm"
              placeholder='<iframe src="..." width="100%" height="400"></iframe>'
            />
            <p class="text-gray-500 text-xs mt-1">Kode embed dari Google Maps atau layanan peta lainnya</p>
          </div>
        </div>
      </div>

      <!-- Submit Buttons -->
      <div class="flex gap-3 pt-6 border-t border-gray-200">
        <button
          type="submit"
          class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-800 transition font-medium"
        >
          Simpan Perubahan
        </button>
        <Link
          href="/dashboard"
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
import { Link, router } from '@inertiajs/vue3';
import AdminLayout from '@/layouts/AdminLayout.vue';

defineOptions({
  layout: AdminLayout,
});

interface BusinessInfo {
  id?: number;
  business_name?: string;
  owner_name?: string;
  email?: string;
  phone?: string;
  whatsapp_number?: string;
  instagram?: string;
  tiktok?: string;
  facebook?: string;
  owner_bank_name?: string;
  owner_bank_account?: string;
  location_link?: string;
  map_embed_code?: string;
  service?: string;
}

interface Props {
  businessInfo: BusinessInfo;
}

const props = defineProps<Props>();

const form = reactive({
  business_name: props.businessInfo.business_name || '',
  owner_name: props.businessInfo.owner_name || '',
  email: props.businessInfo.email || '',
  phone: props.businessInfo.phone || '',
  whatsapp_number: props.businessInfo.whatsapp_number || '',
  instagram: props.businessInfo.instagram || '',
  tiktok: props.businessInfo.tiktok || '',
  facebook: props.businessInfo.facebook || '',
  owner_bank_name: props.businessInfo.owner_bank_name || '',
  owner_bank_account: props.businessInfo.owner_bank_account || '',
  location_link: props.businessInfo.location_link || '',
  map_embed_code: props.businessInfo.map_embed_code || '',
  service: props.businessInfo.service || '',
});

const submitForm = () => {
  router.post('/admin/settings/business-info', form);
};
</script>
