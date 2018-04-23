<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div v-if="loading">
                    Loading...
                </div>
                <div v-else-if="videos.length">
                    <div class="card card-default" v-for="video in videos">
                        <div class="card-header" v-html=video.name></div>
                        <div class="card-body">
                            <video :src=video.file_location width="320" height="240"  type="video/mp4" controls></video>
                            <div>Bitrate:  {{video.bitrate}}</div>
                            <div>Filesize:  {{video.filesize}} bytes</div>
                            <div>Duration:  {{video.duration}} seconds </div>
                            <div>Format:  {{video.format}}</div>
                            <div>Uploaded at:  {{video.created_at}}</div>
                        </div>
                    </div>
                </div>
                <div v-else>
                    <h3>No Videos Uploaded</h3>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                videos:[],
                loading:true
            }
        },
        mounted() {
            this.fetchData();
        },
        methods: {
            fetchData(){
                let self = this;
                axios.get('/videos').then(function(response) {
                    console.log('got data');
                    self.videos = response.data;
                    self.loading = false;
                });
            }
        }
    }
</script>
