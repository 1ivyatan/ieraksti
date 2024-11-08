<script setup>
import InputError from '@/Components/Input/InputError.vue';
import InputLabel from '@/Components/Input/InputLabel.vue';
import PrimaryButton from '@/Components/Button/PrimaryButton.vue';
import TextInput from '@/Components/Input/TextInput.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    music: {
        type: String,
        required: true
    }
});

const form = useForm({
    title: props.music.title,
});

const updateInformation = () => {
    form.put(route("content.music.info.update", {
        id: props.music.id
    }));
}

</script>

<template>
    <section 
        class="bg-white p-4 shadow sm:rounded-lg sm:p-8 mb-8"
    >
        <form
            @submit.prevent="updateInformation"
        >
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

            <PrimaryButton>Update</PrimaryButton>

            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                {{ form.progress.percentage }}
            </progress>
        </form>
    </section>
</template>