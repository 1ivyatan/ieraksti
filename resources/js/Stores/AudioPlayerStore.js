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
        },

        openSingleMusic(music) {
            this.musicList.length = 0;

            this.musicList.push(music);

            this.prepareTrackByIdx(0);
        },

        prepareTrackByIdx(idx) {
            this.musicListIdx = idx;

            if (this.playing) {
                this.pause();
            }

            this.audio = new Audio(this.musicList[this.musicListIdx].audio);
            this.audio.controls = true;

            this.play();
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
        },

        prev() {
            let newidx
                = (this.musicListIdx - 1 >= 0)
                    ? this.musicListIdx - 1
                    : this.musicList.length - 1
            ;
            
            this.prepareTrackByIdx(newidx);
        },

        next() {
            let newidx
                = (this.musicListIdx + 1 < this.musicList.length)
                    ? this.musicListIdx + 1
                    : 0
            ;
            
            this.prepareTrackByIdx(newidx);
        }
    }
});