<template>
  <div>
    <span id="name" @click.prevent="test()">Danh muc: </span>
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Danh muc
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#" 
          v-for="category in categories" 
          :key="category.id"
          @click.prevent="categoriesSelected.push(category)">
          {{category.name}}</a>
      </div>
      <div id="category-items">
        <span class="category-item" v-for="(category, index) in categoriesSelected" :key="category.id">{{category.name}}
          <span class="delete-button" @click.prevent="categoriesSelected.splice(index, 1)">x</span>
        </span>
      </div>
    </div>
    <div>
    <input type="hidden" v-for="category in categoriesSelected" :key="category.id" :value="category.id" name="category_ids[]">
  </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      categories: [],
      category_id: [],
      categoriesSelected: [],
    };
  },
  mounted() {
    this.getCategories();
  },
  methods: {
    getCategories() {
      axios.get("/list-products").then((response) => {
        this.categories = response.data;
      });
    },
  },
};
</script>

<style>
#name {
  margin-bottom: 80px;
  width: 150px;
}
.dropdown {
  display: flex;
  flex-direction: column;
  width: 450px;
}
.dropdown > button {
  background-color: white;
  color: black;
  width: 110px ;
}
.dropdown-menu {
  overflow: auto;
  height: 200px;
}
.delete-button {
  font-size: 20px;
  cursor: pointer;
  margin-left: 20px;
}
.category-item {
  background-color: white;
  border: 1px solid black;
  color: black;
  display: block;
  margin-right: 10px;
  padding: 10px;
  margin: 10px 10px;
}
#category-items {
  display: flex;
  flex-wrap: wrap;
}
</style>