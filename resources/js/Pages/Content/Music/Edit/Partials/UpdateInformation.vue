<script setup>
import InputError from '@/Components/Input/InputError.vue';
import InputLabel from '@/Components/Input/InputLabel.vue';
import PrimaryButton from '@/Components/Button/PrimaryButton.vue';
import TextInput from '@/Components/Input/TextInput.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    id: {
        type: String,
        required: true
    },
    title: {
        type: String,
        required: true
    }
});

const form = useForm({
    title: props.title,
});

const updateInformation = () => {
    form.put("/track/" + props.id, {});
}

</script>

<template>
    <div>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                Track information
            </h2>
        </header>

        <form
            class="mt-6 space-y-6"
            @submit.prevent="updateInformation"
        >
            <TextInput
                id="title"
                type="text"
                class="mt-1 block w-full"
                v-model="form.title"
                required
                autofocus
            />

            <PrimaryButton>Update</PrimaryButton>
        </form>
    </div>
</template>