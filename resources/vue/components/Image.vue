<template>
    <div class="image-content">
        <h4 class="title">Image Converter & Compressor</h4>
        <hr class="hr-title"/>
        <div class="row">
            <div class="col s12">
                <form action="#" enctype="multipart/form-data">
                    <div class="col s12 m6 l6 file-field input-field">
                        <div class="btn">
                            <span>File</span>
                            <input id="file" type="file" v-on:change="setFile">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <select v-model="imgtype" @change="resetCompressFilter">
                            <option value="" disabled selected>Choose the extension you want to convert</option>
                            <option value="image/png">PNG</option>
                            <option value="image/jpeg">JPG</option>
                        </select>
                        <label>Extension Select</label>
                    </div>
                    <div class="col s12 m6 l6">
                        <label>Compres Image</label>
                        <p class="range-field">
                            <input type="range" @change="resetCompressFilter" v-model="compress" class="active" min="0"
                                   max="100"/>
                            <span class="thumb active"
                                  style="height: 30px; width: 30px; top: -30px; margin-left: -7px; left: 100%;"><span
                                class="value">{{compress}}%</span></span>
                        </p>
                    </div>
                    <div class="col s12">
                        <a v-if="compress_file === null" class="waves-effect waves-light btn-small"
                           @click="compressImg"><i class="material-icons left">sync</i>Convert</a>
                        <a v-else class="waves-effect waves-light btn-small" @click="download"><i
                            class="material-icons left">file_download</i>Download</a>
                        <div class="progress" v-if="download_load">
                            <div class="indeterminate"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    const imageConversion = require("image-conversion");

    export default {
        name: 'Imageconverter',
        data() {
            return {
                compress: 100,
                file: null,
                runtime: null,
                compress_file: null,
                imgtype: "image/jpeg",
                width: null,
                height: null,
                download_load: false,
            }
        },

        methods: {
            setFile: function () {
                this.compress_file = null;
                this.file = document.getElementById('file').files[0];
            },

            compressImg: async function () {
                this.download_load = true;
                const file = document.getElementById('file').files[0];
                const file_size = file.size;
                const dataURL = await imageConversion.filetoDataURL(file);
                const image = await imageConversion.dataURLtoImage(dataURL);
                const canvas = await imageConversion.imagetoCanvas(image);
                const f = await imageConversion.canvastoFile(canvas, Number(this.compress) / 100, this.imgtype);
                this.download_load = false;
                this.compress_file = f;
            },

            download: function () {
                imageConversion.downloadFile(this.compress_file);
            },

            resetCompressFilter: function () {
                this.compress_file = null;
            }
        },

        mounted() {

        }
    }
</script>
<style scoped>
    .image-content {

    }

    .title {

    }
</style>
