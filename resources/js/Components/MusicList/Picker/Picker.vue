<script setup>
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
    .then((response) => ( musicLists.list = response ));
});

</script>

<template>
    {{ musicLists.list }}
</template>