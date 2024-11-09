<script setup>
import InputError from '@/Components/Input/InputError.vue';
import InputLabel from '@/Components/Input/InputLabel.vue';
import PrimaryButton from '@/Components/Button/PrimaryButton.vue';
import { useForm  } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    music: {
        type: String,
        required: true
    }
});

const form = useForm({
    audio: null
});

const updateTrack = () => {
    form.post(route("content.music.audio.update", {
        id: props.music.id
    }));
}
</script>

<template>
    <section 
        class="bg-white p-4 shadow sm:rounded-lg sm:p-8 mb-8"
    >
        <form
            @submit.prevent="updateTrack"
            enctype="multipart/form-data"
        >
            <div>
                <div>
                    <InputLabel for="audio" value="Audio" />
                </div>
                <div>
                    <input
                        id="audio"
                        ref="audio"
                        name="audio"
                        type="file"
                        class="mt-1 block w-full"
                        @input="
                            form.audio = $event.target.files[0]
                        " 
                    />
                    <InputError class="mt-2" :message="form.errors.cover" />
                </div>
            </div>

            <div>
                <PrimaryButton>Update</PrimaryButton>
            </div>

            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                {{ form.progress.percentage }}
            </progress>
        </form>
    </section>
</template>