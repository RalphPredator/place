<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, router } from '@inertiajs/vue3';

defineProps({
    categories: Array,
});

const deleteCategory = (category) => {
    router.delete(route('category.destroy', category))
}

</script>

<template>
    <AppLayout title="Category">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Category
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Link class="inline-block rounded-sm bg-indigo-600 px-8 py-3 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:ring-3 focus:outline-hidden"
                    :href="route('category.create')">
                    Create entry
                </Link>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div>
                        <div class="overflow-x-auto bg-white rounded-lg shadow">
                            <table class="w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">ID</th>
                                        <th class="py-3 px-6 text-left">Name</th>
                                        <th class="py-3 px-6 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm">

                                    <tr class="border-b border-gray-200 hover:bg-gray-100"
                                        v-for="(category, index) in categories" :key="index">
                                        <td class="py-3 px-6 text-left">{{ index + 1 }}</td>
                                        <td class="py-3 px-6 text-left">{{ category.name }}</td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex item-center justify-center">
                                                <button type="button" class="w-4 mr-2 transform hover:text-red-500 hover:scale-110" @click="deleteCategory(category.id)">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>

</template>