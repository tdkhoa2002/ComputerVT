<template>
  <div id="upload-image">
      <label for="">Hình ảnh sản phẩm: </label>
      <div id="button-image">
        <input type="file" class="hide" ref="input" name="image_url" @change="changeFile()">
        <button class="btn-image" @click.prevent="openFile">Ảnh chính</button>
        <img src="" alt="" ref="image">
      </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  methods: {
    openFile() {
      this.$refs.input.click();
    },
    changeFile() {
        let file = this.$refs.input.files[0];

        let formData = new FormData();
        formData.append('image_url', file);

        axios.post('/user/image-url', formData).then( response => {
            this.$refs.image.src = '/storage/thumbnails/' + response.data.fileName;
        });
    }
  }
}
</script>

<style>
div input.hide {
  display: none;
}
div#upload-image {
  display: flex;
  justify-content:baseline;
}
div #button-image {
  width: 450px;
}
div button.btn-image {
  width: 77px;
  height: 77px;
  margin: 10px 10px 0 0;
  border: 1px solid #1791f2;
  border-style: dashed;
  background-color: white;

}

</style>