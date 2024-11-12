import { defineStore } from 'pinia';

export const useCounterStore = defineStore('counter', {
    state: () => {
      return { count: 0 }
    },
    // could also be defined as
    // state: () => ({ count: 0 })
    actions: {
      increment() {
        this.count++
      },
    },
  })

  export const useAudioUrlStore = defineStore('audiourl', {
      state: () => {
        return { audiourl: "" }
      },
      // could also be defined as
      // state: () => ({ count: 0 })
      actions: {
        set(url) {
            //if ()

            this.audiourl = url;
            const audio = new Audio(this.audiourl);
          
            audio.addEventListener("loadedmetadata", function() {
                audio.play();
            })
        },
      },
    })