<template>
  <div>
      <button @click="click">Click</button>
  </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            product: [],
        }
    },
    methods: {
        change() {
            axios.get('/user/cart/product/{product}').then(response => {
                this.product = response.data;
            })
        },
        click() {
            console.log(this.product);
            console.log('hello');
        }
        
    }
}
</script>

<style>

</style>