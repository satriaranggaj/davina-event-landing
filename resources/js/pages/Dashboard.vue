<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { Layers, Package, Image, MessageSquare, HelpCircle, ExternalLink, ArrowRight } from 'lucide-vue-next';
import AdminLayout from '@/layouts/AdminLayout.vue';
import { dashboard } from '@/routes';

defineOptions({
    layout: AdminLayout,
});
</script>

<template>
    <Head title="Dashboard" />

    <div class="space-y-8">
        <!-- Welcome Banner -->
        <div class="rounded-lg bg-linear-to-r from-gray-100 to-gray-200 p-8 text-black">
            <h2 class="text-3xl font-bold mb-2">Selamat Datang, Admin! 👋</h2>
            <p class="text-gray-800">Kelola semua konten dan pesanan Davina Event dari dashboard ini.</p>
        </div>

        <!-- Quick Access Grid -->
        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
            <!-- Kategori Card -->
            <Link 
                href="/admin/categories"
                class="group rounded-lg border-2 border-gray-200 bg-white p-6 hover:border-black hover:shadow-lg transition duration-300"
            >
                <div class="flex items-start justify-between">
                    <div class="flex items-center gap-4 flex-1">
                        <div class="rounded-lg bg-black p-3 text-white">
                            <Layers :size="24" />
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600">Kategori Produk</p>
                            <p class="text-lg font-bold text-black mt-1">Kelola</p>
                        </div>
                    </div>
                    <ArrowRight class="text-gray-400 group-hover:text-black transition" :size="20" />
                </div>
            </Link>

            <!-- Produk Card -->
            <Link
                href="/admin/products"
                class="group rounded-lg border-2 border-gray-200 bg-white p-6 hover:border-black hover:shadow-lg transition duration-300"
            >
                <div class="flex items-start justify-between">
                    <div class="flex items-center gap-4 flex-1">
                        <div class="rounded-lg bg-black p-3 text-white">
                            <Package :size="24" />
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600">Produk Sewa</p>
                            <p class="text-lg font-bold text-black mt-1">Kelola</p>
                        </div>
                    </div>
                    <ArrowRight class="text-gray-400 group-hover:text-black transition" :size="20" />
                </div>
            </Link>

            <!-- Galeri Card -->
            <Link
                href="/admin/gallery"
                class="group rounded-lg border-2 border-gray-200 bg-white p-6 hover:border-black hover:shadow-lg transition duration-300"
            >
                <div class="flex items-start justify-between">
                    <div class="flex items-center gap-4 flex-1">
                        <div class="rounded-lg bg-black p-3 text-white">
                            <Image :size="24" />
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600">Galeri Acara</p>
                            <p class="text-lg font-bold text-black mt-1">Kelola</p>
                        </div>
                    </div>
                    <ArrowRight class="text-gray-400 group-hover:text-black transition" :size="20" />
                </div>
            </Link>

            <!-- Testimoni Card -->
            <Link
                href="/admin/testimonials"
                class="group rounded-lg border-2 border-gray-200 bg-white p-6 hover:border-black hover:shadow-lg transition duration-300"
            >
                <div class="flex items-start justify-between">
                    <div class="flex items-center gap-4 flex-1">
                        <div class="rounded-lg bg-black p-3 text-white">
                            <MessageSquare :size="24" />
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600">Testimoni Klien</p>
                            <p class="text-lg font-bold text-black mt-1">Kelola</p>
                        </div>
                    </div>
                    <ArrowRight class="text-gray-400 group-hover:text-black transition" :size="20" />
                </div>
            </Link>

            <!-- FAQ Card -->
            <Link
                href="/admin/faqs"
                class="group rounded-lg border-2 border-gray-200 bg-white p-6 hover:border-black hover:shadow-lg transition duration-300"
            >
                <div class="flex items-start justify-between">
                    <div class="flex items-center gap-4 flex-1">
                        <div class="rounded-lg bg-black p-3 text-white">
                            <HelpCircle :size="24" />
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600">Pertanyaan Umum</p>
                            <p class="text-lg font-bold text-black mt-1">Kelola</p>
                        </div>
                    </div>
                    <ArrowRight class="text-gray-400 group-hover:text-black transition" :size="20" />
                </div>
            </Link>

            <!-- Website Link Card -->
            <Link
                href="/"
                class="group rounded-lg border-2 border-gray-200 bg-white p-6 hover:border-black hover:shadow-lg transition duration-300"
            >
                <div class="flex items-start justify-between">
                    <div class="flex items-center gap-4 flex-1">
                        <div class="rounded-lg bg-black p-3 text-white">
                            <ExternalLink :size="24" />
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600">Website</p>
                            <p class="text-lg font-bold text-black mt-1">Lihat</p>
                        </div>
                    </div>
                    <ArrowRight class="text-gray-400 group-hover:text-black transition" :size="20" />
                </div>
            </Link>
        </div>

        <!-- Info Section -->
        <div class="rounded-lg bg-blue-50 border border-blue-200 p-6">
            <h3 class="font-semibold text-blue-900 mb-2">Tips Mengelola Konten</h3>
            <ul class="text-sm text-blue-800 space-y-1">
                <li>• Update katalog produk secara berkala dengan harga dan spesifikasi terbaru</li>
                <li>• Tambahkan galeri foto untuk showcase instalasi event terbaik Anda</li>
                <li>• Kelola testimoni klien untuk membangun kepercayaan pengunjung</li>
                <li>• Update FAQ untuk menjawab pertanyaan umum pelanggan</li>
            </ul>
        </div>
    </div>
</template>
