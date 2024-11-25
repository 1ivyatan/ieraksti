import { defineStore } from 'pinia';

export const useAudioPlayerStore = defineStore("audioPlayer", {
    state: () => {
        return {
            musicList: [],
            musicListIdx: 0,

            audio: null,
            playing: false,

            /* metadata */
            title: "",
            coverUrl: null,
        }
    },

    actions: {
        openSingleMusic(music) {
            this.musicList.length = 0;

            this.musicList.push(music);

            this.prepareTrackByIdx(0);

            this.play();
        },

        prepareTrackByIdx(idx) {
            this.musicListIdx = idx;

            if (this.playing) {
                this.pauseTrack();
            }

            this.audio = new Audio(this.musicList[this.musicListIdx].audio);
            this.audio.controls = true;
        },

        play() {
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