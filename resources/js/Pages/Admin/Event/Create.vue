<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import QuillEditor from '@/Components/QuillEditor.vue';
import SelectInput from '@/Components/SelectInput.vue';

defineProps({
    categories: Array,
})

const form = useForm({
    name: '',
    description: '',
    resume: '',
    type: '',
    locate: '',
    date: '',
    category_id: '',
});

const createEvent = () => {
    form.post(route('event.store'), {
        errorBag: 'createEvent',
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
};
</script>

<template>
    <AppLayout title="Event">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Event
            </h2>
        </template>
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <FormSection @submitted="createEvent">
                    <template #title>
                        Event data
                    </template>

                    <template #form>
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="name" value="Name" />
                            <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-full" />
                            <InputError :message="form.errors.name" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="category" value="Category" />
                            <SelectInput id="category" v-model="form.category_id" class="mt-1 block w-full">
                                <option v-for="(category, index) in categories" :key="index" :value="category.id">
                                    {{ category.name }}
                                </option>
                            </SelectInput>
                            <InputError :message="form.errors.category_id" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="type" value="Type" />
                            <TextInput id="type" v-model="form.type" type="text" class="mt-1 block w-full" />
                            <InputError :message="form.errors.type" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="locate" value="Locate" />
                            <TextInput id="locate" v-model="form.locate" type="text" class="mt-1 block w-full" />
                            <InputError :message="form.errors.locate" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="date" value="Date" />
                            <TextInput id="date" v-model="form.date" type="date" class="mt-1 block w-full" />
                            <InputError :message="form.errors.date" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="resume" value="Resume" />
                            <textarea id="resume" v-model="form.resume" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm" />
                            <InputError :message="form.errors.resume" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="description" value="Description" />
                            <QuillEditor class="mt-1 block w-full" contentType="html" toolbar="full" theme="snow" v-model="form.description" />
                            <InputError :message="form.errors.description" class="mt-2" />
                        </div>
                    </template>

                    <template #actions>
                        <ActionMessage :on="form.recentlySuccessful" class="me-3">
                            Saved.
                        </ActionMessage>

                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Save
                        </PrimaryButton>
                    </template>
                </FormSection>
            </div>
        </div>
    </AppLayout>

</template>