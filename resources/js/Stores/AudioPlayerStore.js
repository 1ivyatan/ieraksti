import { defineStore } from 'pinia';

export const useAudioPlayerStore = defineStore("audioPlayer", {
    state: () => {
        return {
            musicList: [],
            musicListIdx: 0,

            audio: null,
            playing: false
        }
    },

    actions: {
        openMusicList(musicList, idx) {
            this.musicList.length = 0;

            musicList.forEach(element => {
                this.musicList.push(element);
            });

            this.prepareTrackByIdx(idx);

            this.play();
        },

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

        pause() {
            this.playing = false;
            this.audio.pause();
        },

        toggleTrack() {
            if (this.playing) {
                this.pause();
            } else {
                this.play();
            }
        }
    }
});