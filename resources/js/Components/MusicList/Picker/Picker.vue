<script setup>
import EditButtons from "./EditButtons/EditButtons.vue";
import axios from "axios";
import { ref, onMounted, reactive } from 'vue';

const props = defineProps({
    targetMusic: {
        type: String,
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
const selectedList = ref(null);

const select = (id) => {
    selectedList = id;
    console.log(id);
};

</script>

<template>
    <div 
        v-for="item in musicLists.list"
        class="mb-4"
    >
        <EditButtons
            class="float-right" 
            :id="item.id"
        />

        <button
            @click="select(item.id)"
        >
            {{ item.title }}
        </button>
    </div>
</template>