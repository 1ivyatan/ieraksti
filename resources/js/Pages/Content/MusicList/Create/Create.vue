<script setup>
import AmbiauthenicatedLayout from '@/Layouts/AmbiauthenicatedLayout.vue';
import InputError from '@/Components/Input/InputError.vue';
import InputLabel from '@/Components/Input/InputLabel.vue';
import PrimaryButton from '@/Components/Button/PrimaryButton.vue';
import TextInput from '@/Components/Input/TextInput.vue';
import { useForm, Head } from '@inertiajs/vue3';


const form = useForm({
    title: ""
});

const createList = () => {
    form.post(route("content.musiclist.upload"));
}
</script>

<template>
    <Head title="Create musiclist" />
    <AmbiauthenicatedLayout>
    <section>
        <form
            class="mt-6 space-y-6"
            @submit.prevent="createList"
            enctype="multipart/form-data"
        >
            <!-- title -->
            <div>
                <InputLabel for="title" value="Title" />

                <TextInput 
                    id="title"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.title"
                    required
                    autofocus
                />

                <InputError class="mt-2" :message="form.errors.title" />
            </div>

            <PrimaryButton>Create</PrimaryButton>

            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                {{ form.progress.percentage }}
            </progress>
        </form>
    </section>
    </AmbiauthenicatedLayout>
</template>