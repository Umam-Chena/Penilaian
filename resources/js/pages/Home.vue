<template>
  <div class="min-h-screen bg-gray-50">
    <!-- Header/Navigation -->
    <header class="bg-white shadow">
      <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">Toko Online</h1>
        <p class="text-gray-600 mt-1">Belanja produk berkualitas dengan harga terjangkau</p>
      </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
      <!-- Category Filter -->
      <div class="mb-8">
        <h2 class="text-xl font-semibold text-gray-900 mb-4">Kategori</h2>
        <div class="flex gap-3 flex-wrap">
          <button
            @click="selectedCategory = null"
            :class="[
              'px-4 py-2 rounded-lg font-medium transition',
              selectedCategory === null
                ? 'bg-blue-600 text-white'
                : 'bg-gray-200 text-gray-800 hover:bg-gray-300'
            ]"
          >
            Semua Kategori
          </button>
          <button
            v-for="category in categories"
            :key="category.id"
            @click="selectedCategory = category.id"
            :class="[
              'px-4 py-2 rounded-lg font-medium transition',
              selectedCategory === category.id
                ? 'bg-blue-600 text-white'
                : 'bg-gray-200 text-gray-800 hover:bg-gray-300'
            ]"
          >
            {{ category.name }}
          </button>
        </div>
      </div>

      <!-- Products Grid -->
      <div>
        <h2 class="text-xl font-semibold text-gray-900 mb-6">Produk</h2>
        <div v-if="filteredProducts.length > 0" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
          <div
            v-for="product in filteredProducts"
            :key="product.id"
            class="bg-white rounded-lg shadow-md hover:shadow-lg transition overflow-hidden"
          >
            <!-- Product Image Placeholder -->
            <div class="bg-gray-200 h-48 flex items-center justify-center">
              <span class="text-gray-400 text-sm">Gambar Produk</span>
            </div>

            <!-- Product Info -->
            <div class="p-4">
              <h3 class="font-semibold text-gray-900 mb-1 line-clamp-2">{{ product.name }}</h3>
              
              <p v-if="product.description" class="text-gray-600 text-sm mb-3 line-clamp-2">
                {{ product.description }}
              </p>

              <!-- Category Badge -->
              <div class="mb-3">
                <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded">
                  {{ product.category.name }}
                </span>
              </div>

              <!-- Price -->
              <div class="mb-3">
                <p class="text-xl font-bold text-blue-600">
                  Rp {{ formatPrice(product.price) }}
                </p>
              </div>

              <!-- Stock Info -->
              <div class="mb-4">
                <p :class="[
                  'text-sm font-medium',
                  product.stock > 0 ? 'text-green-600' : 'text-red-600'
                ]">
                  {{ product.stock > 0 ? `Stok: ${product.stock}` : 'Stok Habis' }}
                </p>
              </div>

              <!-- Add to Cart Button -->
              <button
                :disabled="product.stock === 0"
                :class="[
                  'w-full py-2 px-4 rounded-lg font-medium transition',
                  product.stock > 0
                    ? 'bg-blue-600 text-white hover:bg-blue-700'
                    : 'bg-gray-300 text-gray-500 cursor-not-allowed'
                ]"
              >
                {{ product.stock > 0 ? 'Tambah ke Keranjang' : 'Stok Habis' }}
              </button>
            </div>
          </div>
        </div>

        <!-- Empty State -->
        <div v-else class="text-center py-12">
          <p class="text-gray-600 text-lg">Tidak ada produk yang tersedia</p>
        </div>
      </div>
    </main>
  </div>
</template>

<script setup lang="ts">
import { computed, ref } from 'vue'

interface Product {
  id: number
  name: string
  price: number
  stock: number
  description: string | null
  category_id: number
  category: {
    id: number
    name: string
  }
}

interface Category {
  id: number
  name: string
}

interface Props {
  products: Product[]
  categories: Category[]
}

const props = defineProps<Props>()
const selectedCategory = ref<number | null>(null)

const filteredProducts = computed(() => {
  if (selectedCategory.value === null) {
    return props.products
  }
  return props.products.filter(product => product.category_id === selectedCategory.value)
})

const formatPrice = (price: number): string => {
  return new Intl.NumberFormat('id-ID').format(price)
}
</script>

<style scoped>
.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>
