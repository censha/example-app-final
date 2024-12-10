<template>
    <div>
        <video ref="videoPlayer" class="video-js" :currentTime="videoTime" @canplay="load" ></video>
    </div>
</template>

<script>
import videojs from 'video.js';

export default {
 //   this.$refs.videoPlayer.currentTime = this.videotime; то самое

    name: 'VideoPlayer',
    props: {
        options: {
            type: Object,
            default() {
                return {};
            }
        },
        videotime: null,
    },
    data() {
        return {
            maxpause: 0,
            player: null
        }
    },
    mounted() {
        this.player = videojs(this.$refs.videoPlayer, this.options, () => {
            this.player.log('onPlayerReady', this);
        });
        this.$emit('duration', this.duration);
    },
    computed: {
        duration() {
            console.log("DDD", this.$refs.videoPlayer.duration);
            return this.$refs.videoPlayer.duration;
        },

    },
    beforeDestroy() {
        if (this.player) {
            this.player.dispose();
        }
    },
    methods: {
        updateLength(min, max){
            console.log( document.getElementsByTagName('video'), min);
            document.getElementsByTagName('video').vjs_video_3_html5_api.currentTime = min;
            document.getElementsByTagName('video').vjs_video_3_html5_api.maxpause = max;
            setInterval(function() {
                if(document.getElementsByTagName('video').vjs_video_3_html5_api.maxpause && document.getElementsByTagName('video').vjs_video_3_html5_api.maxpause <= document.getElementsByTagName('video').vjs_video_3_html5_api.currentTime){
                    document.getElementsByTagName('video').vjs_video_3_html5_api.pause();
                }
            }, 1000)

        },
        load() {
            console.log('videotime = ' + this.videotime);
            console.log(document.querySelectorAll('video'));
            console.log("!!!!!!!!!");
            const interval = setInterval(() => {
                try {
                    var d = this.$refs.videoPlayer.duration;
                    console.log("===", d);
                    if (d) {
                        this.$emit('duration', d);
                        clearInterval(interval);
                    }
                } catch (_) { }
            }, 1000);
        }
    },
}
</script>
