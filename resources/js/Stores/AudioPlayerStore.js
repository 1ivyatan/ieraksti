import { defineStore } from 'pinia';


export const useAudioPlayerStore = defineStore("audioPlayer", {
    state: () => {
        return {

            audio: null,
            playing: false,

            /* metadata */
            title: "",
            coverUrl: null,
        }
    },

    actions: {
        openTrack(music) {
            if (this.playing) {
                this.pauseTrack();
                this.audio.src = "";
            }

            this.audio = new Audio(music.audio);
            this.audio.controls = true;

            this.title = music.title;
            this.coverUrl = (music.cover != null) ? music.cover : null;

            console.log(this.audio)
        },

        playTrack() {
            this.playing = true;
            this.audio.play();
        },

        pauseTrack() {
            this.playing = false;
            this.audio.pause();
        },

        openAndPlay(music) {
            this.openTrack(music);
            this.playTrack();
        },

        toggleTrack() {
            if (this.playing) {
                this.pauseTrack();
            } else {
                this.playTrack();
            }
        }
    }
});