<template>
  <div id="nav">
    <a href="https://www.unisuam.edu.br/">
      <img src="..\assets\logofaixa_unisuam.png" alt="Logo Unisuam" />
    </a>
  </div>
</template>
<style scoped>
#nav {
  background-image: linear-gradient(to right, #ffffff, #ffffff, rgb(226, 111, 3));
  border-bottom: 4px solid #f0f9ff;
  padding: 5px 40px;
  display: flex;
  justify-content: flex-start;
  align-items: center;
  height: 80px;
}
#nav a {
  color: #fcba03;
  text-decoration: none;
  margin: 12px;
  transition: 0.5s;
}
#nav a:hover {
  color: #fff;
}
#nav img {
  width: 220px;
  height: auto;
}
</style>