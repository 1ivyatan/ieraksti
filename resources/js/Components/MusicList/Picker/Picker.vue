<script setup>
import PrimaryButton from "@/Components/Button/PrimaryButton.vue";
import axios from "axios";
import { ref, onMounted, reactive } from 'vue';

const props = defineProps({
    targetMusic: {
        type: String,
        required: true
    },
    action: {
        type: Function,
        required: true
    }
});

const musicLists = reactive({
    list: null
});

onMounted(() => {
    axios.get(route('user.musiclist.show'))
    .then((response) => ( musicLists.list = response.data ));
});

/* selection */
const selectedList = ref(0);
const isSelected = ref(false);

const select = (id) => {
    selectedList.value = id;
    isSelected.value = true;
};

</script>

<template>
    <h1>
        Select playlist
    </h1>

    <div
        class="overflow-auto max-h-80"
    >
        <div 
            v-for="item in musicLists.list"
            class="mb-4"
        >
            <button
                @click="select(item.id)"
            >
                {{ item.title }}
            </button>
        </div>
    </div>

    <PrimaryButton
        :disabled = "!isSelected"
        @click="props.action(selectedList)"
    >
        Select
    </PrimaryButton>
</template>