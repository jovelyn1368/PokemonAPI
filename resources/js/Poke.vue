<template>
  <div id="app">
    <pokemon/>
  </div>
</template>

<script>
import Pokemon from "./components/Pokemon.vue";

export default {
  name: "app",
  components: {
    Pokemon
  }
};
</script>

<style>
@import url("https://use.fontawesome.com/releases/v5.8.2/css/all.css");

body {
  margin: 0;
  padding: 0;
}
#app {
  background: radial-gradient(#6da566, #0f8392);
}
#app-2 {
  background: radial-gradient(#ffff, #ffff);
}
</style>
