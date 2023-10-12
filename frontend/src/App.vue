<script setup>
  import Header from "@/components/Header.vue";
  import Footer from "@/components/Footer.vue";
</script>

<template>
  <!-- <notifications /> -->
  <notifications position="center" />
  <Header />
  <div class="container mx-auto px-4">
    <RouterView />
  </div>
  <Footer />
</template>

<style>
* {
  font-family: Arial, Helvetica, sans-serif;
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
</style>
